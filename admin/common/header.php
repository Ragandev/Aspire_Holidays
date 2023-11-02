<?php
 require('../config.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Aspire Holidays</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
      integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    
        <style>
        .btn-box{
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: end;
        }
        .admin-box{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
            margin-top: 30px;
            background-color: #f0870d;
            color: #fff;
            border-radius: 20px;
        }
        .main-box .box1 .box2 .box3{
            height:150px;
        }
        .box1{
            background-color:red;
        }
        .slide-counter
        {
          display:flex;
          align-items:center;
          justify-content:center;
          /*width:100vw;*/
          /*height:100vh;*/
          margin-top:50px;
          padding:0;
          /*background-image: linear-gradient(90deg, #ffb170, #ff76d5);*/
          /*font-family: Helvetica;*/
        }
        
        .fill-purple
        {
          background-image: linear-gradient(90deg, #4addff, #a34dfe);
        }
        
        .fill-green
        {
          background-image: linear-gradient(90deg, #ffe40c, #33d497);
        }
        
        .fill-blue
        {
          background-image: linear-gradient(90deg, #285ca5, #18d5ff);
        }
        
        .fill-orange
        {
          background-image: linear-gradient(90deg, #fcf595, #ff954d);
        }
        
        .cards
        {
          display:flex;
          flex-direction:row;
          align-items:center;
          justify-content:center;
          position: relative;
          height:21.875rem;
          width:100%;
        }
        
        .card
        {
          display:flex;
          width:27.8125rem;
          height:16.25rem;
          border-radius:0.5rem;
          transform-origin:center center;
          transform:scale(1) translate(0px,0px) perspective( 750px ) rotateY(0deg);
          transition-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
          transition-duration: 0.5s;
          position:absolute;
          top:0;
          box-shadow:0 30px 50px rgba(0,0,0,0.1);
          z-index:3;
          cursor: pointer;
          overflow:hidden;
        }
        
        .card *
        {
          pointer-events: none;
        }
        
        .card--left
        {
          transform:scale(0.75) translate(-335px,0px) perspective( 750px ) rotateY(10deg);
          box-shadow:0 15px 25px rgba(0,0,0,0.1);
          z-index:1;
        }
        
        .card--center
        {
          transform:scale(1) translate(0px, 0px) perspective( 750px ) rotateY(0deg);
          box-shadow:0 30px 50px rgba(0,0,0,0.1);
          z-index:3;
        }
        
        .card--right
        {
          transform:scale(0.75) translate(335px,0px) perspective( 750px ) rotateY(-10deg);
          box-shadow:0 15px 25px rgba(0,0,0,0.1);
          z-index:1;
        }
        
        .card__icon
        {
          width:30%;
          height:100%;
          background:rgba(255,255,255,0.5);
          position:relative;
          display:flex;
          align-items: center;
          justify-content: center;
        }
        
        .card__icon:before
        {
          content:attr(data-icon);
          font-size:3rem;
          position:absolute;
          display:flex;
          align-items: center;
          justify-content: center;
          width:100px;
          height:100px;
          border-radius: 50px;
          background:rgba(255,255,255,1);
        }
        
        .card__detail
        {
          flex:1;
          display:flex;
          align-items: center;
          justify-content: center;
        }
        
        @media only screen and (max-width : 736px)
        {
          .cards
          {
            flex-direction:column;
            margin:auto 0;
          }
        
          .card
          {
            display:flex;
            width:90%;
          }
        
          .card--left
          {
            transform:scale(0.75) translate(0px, -150px) perspective(750px) rotateY(0) rotateX(-10deg) translateZ(-5px);
          }
        
          .card--center
          {
            transform:scale(1) translate(0px, 0px) perspective( 750px ) rotateY(0deg)  rotateX(0deg) translateZ(5px);
          }
        
          .card--right
          {
            transform:scale(0.75) translate(0px, 150px) perspective(750px) rotateY(0) rotateX(10deg) translateZ(-5px);
          }
        
          .card__icon:before
          {
            transform:scale(0.75);
          }
        }
    </style>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
          <a class="navbar-brand" href="#"><strong>Aspire Holidays</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="package.php">Package</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="blog.php">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="user.php">Users</a>
              </li>
            </ul>
            <form action="logout.php">
              <button type="submit" class="btn btn-danger">Logout</button>
              </form>
            </form>
          </div>
        </div>
      </nav>