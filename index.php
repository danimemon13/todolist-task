<!DOCTYPE html>
<html>
  <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>
  <body>
      <?php
      require_once('connection.php');
      $client = getClient();
      if(! is_a ($client, "Google_Client")) {
              echo $client;
      }
      else { ?>
          <input type='date' id='available_dates'/>
          <select id='available_times'>
              <option value="0">0:00</option>
              <option value="1">1:00</option>
              <option value="2">2:00</option>
              <option value="3">3:00</option>
              <option value="4">4:00</option>
              <option value="5">5:00</option>
              <option value="6">6:00</option>
              <option value="7">7:00</option>
              <option value="8">8:00</option>
              <option value="9">9:00</option>
              <option value="10">10:00</option>
              <option value="11">11:00</option>
              <option value="12">12:00</option>
              <option value="13">13:00</option>
              <option value="14">14:00</option>
              <option value="15">15:00</option>
              <option value="16">16:00</option>
              <option value="17">17:00</option>
              <option value="18">18:00</option>
              <option value="19">19:00</option>
              <option value="20">20:00</option>
              <option value="21">21:00</option>
              <option value="22">22:00</option>
              <option value="23">23:00</option>
          </select>
          <input type='text' id='task' placeholder="Enter Task"/>
          <button id='submit'>Schedule me!</button>
          
          
          <p id='dump'>
              
              
          </p>

          <script>
              $(document).ready(function() {
                  document.getElementById('available_dates').addEventListener('change', function(){
                      //get_times(this);
                  });
                  document.getElementById('submit').addEventListener('click', function(){
                      schedule_me(this);
                  });
              });

              function get_times(date_picker) {
                  var date = date_picker.value;
                  //https://www.w3schools.com/xml/xml_http.asp
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                         // Typical action to be performed when the document is ready:
                         document.getElementById('available_times').innerHTML = xhttp.responseText;
                      }
                  };
                  xhttp.open('GET', 'calendars.php?action=get_times&date='+date+'&t=' + Math.random());
                  xhttp.setRequestHeader('X-Requested-With', 'xmlhttprequest');
                  xhttp.send();
              }

              function schedule_me(btn) {
                  var date = document.getElementById('available_dates').value;
                  var time = document.getElementById('available_times').value;
                  var task = document.getElementById('task').value;
                  //https://www.w3schools.com/xml/xml_http.asp
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                         // Typical action to be performed when the document is ready:
                         document.getElementById('dump').innerHTML = xhttp.responseText;
                      }
                  };
                  xhttp.open('GET', 'calendars.php?action=schedule_me&task='+task+'&date='+date+'&time='+time+'&t=' + Math.random());
                  xhttp.setRequestHeader('X-Requested-With', 'xmlhttprequest');
                  xhttp.send();
              }
          </script>

      <?php }
      ?>
  </body>
</html>
