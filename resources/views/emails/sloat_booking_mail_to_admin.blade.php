<!DOCTYPE html>
<html>
<head>
    <title>Session Booking Notifications</title>
</head>
<style>
   table, th, td {
     border: 1px solid black;
   }
</style>
<body>
<p>Hey Coach you receive a new session booking.</p>
   

   <h3>Session Details </h3>
   <p>
      <b>Session Date: </b>{{$formdata['slot_date']}}<br>
      <b>Start Time: </b>{{$formdata['start_time']}}<br>
      <b>End Time: </b>{{$formdata['end_time']}}<br>

   </p>

  
   <h3>User Details </h3>
   <p>
      <b>Username: </b>{{GetUserinfo($formdata['user_id'], 'first_name'); }} {{GetUserinfo($formdata['user_id'], 'last_name'); }}<br>
      <b>Email: </b>{{GetUserinfo($formdata['user_id'], 'email'); }}<br>
   </p>

  
   <p>Coach Ruth</p>
</body>
</html>