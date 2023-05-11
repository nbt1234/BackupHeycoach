<!DOCTYPE html>
<html>
<head>
    <title>Reminder Notifications</title>
</head>
<body>
   <p>Hi Coachee , {{$user_id['user_name']}}</p>
    <p>Yesterday, Your goal for category <b><u>{{$user_id['categories_name']}}</u></b>  was incomplete. Please click below link to complete your goal. </p>
       <a href="{{$user_id['url']}}">{{$user_id['url']}}</a>
    <p>Coach Ruth</p>
</body>
</html>