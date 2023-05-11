<!DOCTYPE html>
<html>
<head>
    <title>Matchning Goal Notifications</title>
</head>
<body>
   <p>Hi Coachee {{$username}}</p>
    <p>Great news. You have done the hard work and you now have a realistic goal that you know you can achieve!</p>
    <p>Next step -> Please login to HeyCoach to complete “Matching goal to gap”</p>    
    <p>Your current step :- <a href="{{URL::to('/step7')}}">{{URL::to('/step7')}}</a></p>
    <p>Coach Ruth</p>
</body>
</html>