<html>
<head>
  <style>
  #id_work_days input[type="radio"] {
  display: none;
  }

  #id_work_days span {
    display: inline-block;
    padding: 10px;
    text-transform: uppercase;
    border: 2px solid gold;
    border-radius: 3px;
    color: gold;
  }

  #id_work_days input[type="radio"]:checked + span {
    background-color: gold;
    color: black;
  }
  </style>

</head>

<body>
  <p id="id_work_days">
  <label><input type="radio" name="work_days" value="1"><span>sun</span></label>
  <label><input type="radio" name="work_days" value="2"><span>mon</span></label>
  <label><input type="radio" name="work_days" value="3"><span>tue</span></label>
  <label><input type="radio" name="work_days" value="4"><span>wed</span></label>
  <label><input type="radio" name="work_days" value="5"><span>thu</span></label>
  <label><input type="radio" name="work_days" value="6"><span>fri</span></label>
  <label><input type="radio" name="work_days" value="7"><span>sat</span></label>
</p>
</body>

</html>
