<!DOCTYPE html>
<html>
<head>
    <title>Registration Notifications</title>
</head>
<body>
   <p>Hi Coachee {{GetUserinfo($formdata['user_id'], 'username')}}</p>
    <p>Congrats! This is such a powerful step in your journey. You now have a really good understanding of where and how you spend your money. This allows you to make proper decisions on how you can use your money to successfully reach your goals.</p>
    <p>Next step -> Please login to HeyCoach to complete “Matching goal to gap”</p>
    <p>Don’t forget to watch the videos and opt to join a live coaching session to get started</p>
    <p>Your current step :- <a href="{{URL::to('/step6')}}">{{URL::to('/step6')}}</a></p>
       
    <p>Coach Ruth</p>
</body>
</html>