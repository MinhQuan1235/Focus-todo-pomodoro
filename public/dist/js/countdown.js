var pomodoro = {
    init: function() {
        // Khởi tạo
        this.domVariables();
        this.timerVariables();
        this.bindEvents();
        this.updateAllDisplays();
        this.requestNotification();
        this.podomoro_add = 0;
        this.quantity_podomoro1 = document.getElementById('pomodoro_count').getAttribute('data-quantity-podomoro');
        this.audio = null;
    },
    // Định nghĩa thông báo được sử dụng bởi Pomodoro
    breakNotification: undefined,
    workNotification: undefined,
    domVariables: function() {
        // Các biến DOM
        this.toggleTimerBtns = document.getElementsByClassName("toggle-timer");
        this.increaseSession = document.getElementById("increase-session");
        this.decreaseSession = document.getElementById("decrease-session");
        this.increaseBreak = document.getElementById("increase-break");
        this.decreaseBreak = document.getElementById("decrease-break");

        // Hiển thị thời gian
        this.sessionLengthDisplay = document.getElementById("session-length");
        this.breakLengthDisplay = document.getElementById("break-length");

        // Đếm ngược
        this.countdownDisplay = document.getElementById("countdown");
        this.typeDisplay = document.getElementById("type");
        this.resetCountdownBtn = document.getElementById("reset-session");
        this.stopCountdownBtn = document.getElementById("stop-session");
        this.startCountdownBtn = document.getElementById("start-session");
        this.countdownContainer = document.getElementById("countdown-container");
    },
    timerVariables: function() {
        // Các biến thời gian
        this.sessionLength = 25;
        this.breakLength = 5;

        // Định nghĩa biến chứa phương thức setInterval
        // Nếu đồng hồ đang đếm ngược, giá trị sẽ là true, và
        // đếm ngược sẽ bị dừng khi nhấn
        this.timeinterval = false;
        this.workSession = true;
        this.pausedTime = 0;
        this.timePaused = false;
        this.timeStopped = false;
        // Yêu cầu quyền
    },
    bindEvents: function() {
        // Ràng buộc tăng/giảm thời gian phiên vào các nút
        this.increaseSession.onclick = pomodoro.incrSession;
        this.decreaseSession.onclick = pomodoro.decrSession;
        this.increaseBreak.onclick = pomodoro.incrBreak;
        this.decreaseBreak.onclick = pomodoro.decrBreak;

        // Ràng buộc ngày bắt đầu vào #countdown và các nút đếm ngược
        this.countdownDisplay.onclick = pomodoro.startCountdown;
        this.resetCountdownBtn.onclick = pomodoro.resetCountdown;
        this.stopCountdownBtn.onclick = pomodoro.stopCountdown;
        this.startCountdownBtn.onclick = pomodoro.startCountdown;
    },
    updateAllDisplays: function() {
        // Thay đổi HTML của các hiển thị để phản ánh các giá trị hiện tại
        pomodoro.sessionLengthDisplay.innerHTML = this.sessionLength;
        pomodoro.breakLengthDisplay.innerHTML = this.breakLength;
        pomodoro.countdownDisplay.innerHTML = this.sessionLength + ":00";

        pomodoro.resetVariables();
    },
    requestNotification: function() {
        // Yêu cầu thông báo
        if (!("Notification" in window)) {
            return console.log("Trình duyệt này không hỗ trợ thông báo trên desktop");
        }
    },
    // Tăng thời gian phiên
    incrSession: function() {
        if (pomodoro.sessionLength < 59) {
            pomodoro.sessionLength += 1;
            pomodoro.updateAllDisplays();
        }
    },
    // Giảm thời gian phiên
    decrSession: function() {
        if (pomodoro.sessionLength > 1) {
            pomodoro.sessionLength -= 1;
            pomodoro.updateAllDisplays();
        }
    },
    // Tăng thời gian nghỉ
    incrBreak: function() {
        if (pomodoro.breakLength < 30) {
            pomodoro.breakLength += 1;
            pomodoro.updateAllDisplays();
        }
    },
    // Giảm thời gian nghỉ
    decrBreak: function() {
        if (pomodoro.breakLength > 1) {
            pomodoro.breakLength -= 1;
            pomodoro.updateAllDisplays();
        }
    },
    // Đặt lại các biến về giá trị ban đầu
    resetVariables: function() {
        pomodoro.timeinterval = false;
        pomodoro.workSession = true;
        pomodoro.pausedTime = 0;
        pomodoro.timeStopped = false;
        pomodoro.timePaused = false;
    },
    // Bắt đầu đếm ngược
    startCountdown: function() {
        pomodoro.disableButtons();
        // Chuyển đổi giữa hiển thị phiên làm việc và nghỉ
        pomodoro.displayType();

        // Tạm dừng đếm ngược nếu đang chạy, nếu không, bắt đầu đếm ngược
        if (pomodoro.timeinterval !== false) {

            pomodoro.pauseCountdown();
        } else {

            // Đặt thời gian bắt đầu và kết thúc bằng thời gian hệ thống và chuyển đổi sang
            // mili giây để đo thời gian đã trôi qua chính xác
            pomodoro.startTime = new Date().getTime();

            // Kiểm tra xem pomodoro vừa bị tạm dừng không
            if (pomodoro.timePaused === false) {

                pomodoro.unPauseCountdown();
            } else {
                pomodoro.endTime = pomodoro.startTime + pomodoro.pausedTime;
                pomodoro.timePaused = false;
            }

            // Cập nhật đếm ngược mỗi 990ms để tránh trễ với 1000ms,
            // Cập nhật đếm ngược kiểm tra thời gian với thời gian hệ thống và cập nhật
            // hiển thị #countdown
            pomodoro.timeinterval = setInterval(pomodoro.updateCountdown, 990);
        }


    },
    // Cập nhật đếm ngược
    updateCountdown: function() {
// Lấy sự khác biệt giữa thời gian hiện tại và
// thời gian kết thúc trong mili giây. sự khác biệt = thời gian còn lại
        var currTime = new Date().getTime();
        var difference = pomodoro.endTime - currTime;

        // Chuyển đổi thời gian còn lại từ mili giây sang phút và giây
        var seconds = Math.floor((difference / 1000) % 60);
        var minutes = Math.floor((difference / 1000) / 60 % 60);

        // Thêm 0 vào trước giây nếu nhỏ hơn mười
        if (seconds < 10) { seconds = "0" + seconds; }

        // Hiển thị phút và giây còn lại, trừ khi ít hơn 1 giây
        // trên bộ hẹn giờ. Sau đó chuyển sang phiên tiếp theo.
        if (difference > 1000) {
            pomodoro.countdownDisplay.innerHTML = minutes + ":" + seconds;
        } else {
            pomodoro.changeSessions();
        }
    },
    // Chuyển sang phiên làm việc hoặc nghỉ
    changeSessions: function() {
        // Dừng đếm ngược
        clearInterval(pomodoro.timeinterval);

        // Phát âm thanh
        pomodoro.playSound();

        // Chuyển đổi giữa phiên làm việc
        // Điều này xác định xem phiên nghỉ hay làm việc sẽ được hiển thị
        if (pomodoro.workSession === true) {

            pomodoro.workSession = false;
            // Hiển thị thông báo cho phiên làm việc
            pomodoro.podomoro_add++;
            pomodoro.showNotification("Bắt đầu phiên nghỉ");
        } else {
            pomodoro.workSession = true;
            // Hiển thị thông báo cho phiên nghỉ

            pomodoro.showNotification("Bắt đầu phiên làm việc");
        }

        // Dừng đếm ngược
        pomodoro.timeinterval = false;

        // Khởi động lại, với phiên làm việc đã thay đổi
        pomodoro.startCountdown();

        console.log(pomodoro.podomoro_add);
        console.log(pomodoro.quantity_podomoro1);

        if (pomodoro.podomoro_add >= pomodoro.quantity_podomoro1 ) {
            pomodoro.showNotification("Hoàn thành pomodoro");
            pomodoro.pauseCountdown();
            document.getElementById('pomodoroCheckbox').checked = true;
            document.getElementById('pomodoroForm').submit();
            return; // Dừng lại nếu pomodoro.pomodoroCount đạt hoặc vượt quá 2
        }
    },
// Hàm hiển thị thông báo
    showNotification: function(message) {
        // Kiểm tra xem trình duyệt hỗ trợ thông báo hay không
        if ('Notification' in window) {
            // Yêu cầu sự cho phép hiển thị thông báo
            Notification.requestPermission().then(function(permission) {
                // Nếu được phép, hiển thị thông báo
                if (permission === 'granted') {
                    var notification = new Notification('Pomodoro', {
                        body: message
                    });
                }
            });
        }
    },

    // Tạm dừng đếm ngược
    pauseCountdown: function() {
        // Lưu thời gian tạm dừng để khởi động lại đồng hồ vào thời gian chính xác
        var currTime = new Date().getTime();
        pomodoro.pausedTime = pomodoro.endTime - currTime;
        pomodoro.timePaused = true;

        // Dừng đếm ngược khi nhấn lần thứ hai
        clearInterval(pomodoro.timeinterval);

        // Đặt lại biến để đồng hồ sẽ bắt đầu lại khi nhấn
        pomodoro.timeinterval = false;
    },
    // Tiếp tục đếm ngược
    unPauseCountdown: function() {
        if (pomodoro.workSession === true) {
            pomodoro.endTime = pomodoro.startTime + (pomodoro.sessionLength * 60000);
        } else {
            pomodoro.endTime = pomodoro.startTime + (pomodoro.breakLength * 60000);
        }
    },
    // Đặt lại đồng hồ
    resetCountdown: function() {
        // Dừng đồng hồ và đặt lại biến
        clearInterval(pomodoro.timeinterval);
        pomodoro.resetVariables();

        // Khởi động lại biến
        pomodoro.startCountdown();
    },
    // Dừng đồng hồ
    stopCountdown: function() {
        // Dừng đếm ngược
        clearInterval(pomodoro.timeinterval);

        // Thay đổi HTML
        pomodoro.updateAllDisplays();

        // Đặt lại biến
        pomodoro.resetVariables();

        // Cho phép nút
        pomodoro.unDisableButtons();
    },
    // Hiển thị loại
    displayType: function() {
        // Kiểm tra phiên đang chạy và thay đổi giao diện và văn bản ở trên
        // đồng hồ đếm ngược tùy thuộc vào phiên (nghỉ hoặc làm việc)
        if (pomodoro.workSession === true) {
            pomodoro.typeDisplay.innerHTML = "phiên làm việc";
            pomodoro.countdownContainer.className = pomodoro.countdownContainer.className.replace("break", "");
        } else {
            pomodoro.typeDisplay.innerHTML = "Nghỉ";
            if (pomodoro.countdownContainer.className !== "break") {
                pomodoro.countdownContainer.className += "break";
            }
        }
    },
    // Phát âm thanh
    playSound: function() {
        var mp3 = "http://soundbible.com/grab.php?id=1746&type=mp3";
        var audio = new Audio(mp3);
        audio.play();
    },
    playSoundCount: function() {
        var mp3 = "/dist/sount/Tieng-kim-giay-dong-ho-keu-www_tiengdong_com.mp3";
        this.audio = new Audio(mp3);
        this.audio.play();
    },
    stopSoundCount: function() {
        if (this.audio) {
            this.audio.pause(); // Dừng phát âm thanh
            this.audio.currentTime = 0; // Đặt lại thời gian phát về 0
        }
    },
    // Vô hiệu hóa nút
    disableButtons: function() {
        for (var i = 0; i < pomodoro.toggleTimerBtns.length; i++) {
            pomodoro.toggleTimerBtns[i].setAttribute("disabled", "disabled");
            pomodoro.toggleTimerBtns[i].setAttribute("title", "Dừng đồng hồ để thay đổi độ dài bộ hẹn giờ");
        }
    },
    // Kích hoạt nút
    unDisableButtons: function() {
        for (var i = 0; i < pomodoro.toggleTimerBtns.length; i++) {
            pomodoro.toggleTimerBtns[i].removeAttribute("disabled");
            pomodoro.toggleTimerBtns[i].removeAttribute("title");
        }
    }
};
// Sự kiện click cho nút "Pause"
document.getElementById("pause-session").addEventListener("click", function() {
    // Kiểm tra xem thời gian đếm ngược đang chạy hay không
    if (pomodoro.timeinterval !== false) {
        // Gọi hàm pauseCountdown để tạm dừng thời gian đếm ngược
        pomodoro.pauseCountdown();
    }
});

// Sự kiện click cho nút "Start"
document.getElementById("start-session").addEventListener("click", function() {
    // Ẩn nút "Start"
    this.style.display = "none";
    // Hiện nút "Pause"
    document.getElementById("pause-session").style.display = "inline-block";
    pomodoro.playSoundCount();
});

// Sự kiện click cho nút "Pause"
document.getElementById("pause-session").addEventListener("click", function() {
    // Ẩn nút "Pause"
    this.style.display = "none";
    // Hiện nút "Continue"
    document.getElementById("continue-session").style.display = "inline-block";
    pomodoro.stopSoundCount();
});

// Sự kiện click cho nút "Continue"
document.getElementById("continue-session").addEventListener("click", function() {
    // Ẩn nút "Continue"
    this.style.display = "none";
    // Hiện nút "Pause"
    document.getElementById("pause-session").style.display = "inline-block";
    // Bắt đầu đếm ngược lại
    pomodoro.startCountdown();
    pomodoro.playSoundCount();

});

// Sự kiện bắt đầu khi tải trang
pomodoro.init();
