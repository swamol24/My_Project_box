<!DOCTYPE html>
<html>
<head>
  <style>
   *{box-sizing: border-box;
      }
      body{
        background: lightblue;
      }
      .grid-container{
        width: 900px;
        margin: auto;
        padding: 10px;
                border: 2px solid lightcoral;
                border-radius: 5px;
                box-shadow:0px 6px 8px 10px  ;
                background: linear-gradient(to bottom,purple,lightblue,cyan,skyblue);
        position: relative; 
        height: 270px; 
        display: grid;
      grid-template-columns: 1fr 1fr;
      grid-gap: 10px;     
      }
      #title{
        background: floralwhite;
         border-radius: 5px;
      }

      label{
        font-size: 15px;
        font-weight: bold;
      }
      input{
      font-size: 15px;
      font-family: 'Flamenco', cursive;
       border-radius: 5px;
      }
      .grid-item {
      border: 1px solid #ccc;
      padding: 10px;
    }

    .submit-btn {
      color:rgb(255, 255, 255);
    background-color: rgb(108, 22, 189);
    padding:7px;
    font-size: large;
    border-radius: 10px;
    top: 87%;
    }
    #div{
      display: flex;
      justify-content: end;
    }
  </style>
</head>
<body>
  <form id="form">
        <center>  <h2 id="title">Submition Form</h2></center>
    <div class="grid-container">
      <div class="grid-item">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname">
      </div>
      <div class="grid-item">
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname">
      </div>
      <div class="grid-item">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
      </div>
      <div class="grid-item">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
      </div>
      <div class="grid-item">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone">
      </div>
      <div class="grid-item">
        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea>
      </div>
      
        <div id="div"><button class="submit-btn" type="submit">Submit</button></div>
      
    </div>
  </form>
</body>
</html>
