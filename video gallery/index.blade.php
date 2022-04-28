<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div id="menu-btn" class="fas fa-bars"></div>

<div class="container">

    <div class="side-bar">

        <ul class="list">
            <li class="active" data-src="images/vid-1.mp4">cheese burger</li>
            <li data-src="images/vid-2.mp4">pizza decoration</li>
            <li data-src="images/vid-3.mp4">sandwich decoration</li>
            <li data-src="images/vid-4.mp4">puring coffee</li>
            <li data-src="images/vid-5.mp4">chocolate closeup</li>
            <li data-src="images/vid-6.mp4">slicing cake</li>
            <li data-src="images/vid-7.mp4">donuts zooming</li>
            <li data-src="images/vid-8.mp4">instead noodles</li>
        </ul>

    </div>

    <div class="video-container">
        <video src="images/vid-1.mp4" loop muted autoplay controls></video>
    </div>

</div>

<script>

let sideBar = document.querySelector('.container .side-bar');

document.querySelector('#menu-btn').onclick = () =>{
    sideBar.classList.toggle('active');
};

let video = document.querySelector('.container .video-container video');
let videoLinks = document.querySelectorAll('.container .side-bar .list li');

videoLinks.forEach(link =>{
    link.onclick = () =>{
        let src = link.getAttribute('data-src');
        video.src = src;
        sideBar.classList.remove('active');
        videoLinks.forEach(remove =>{remove.classList.remove('active')});
        link.classList.add('active');
    }
})

</script>
    
</body>
</html>