<!DOCTYPE html>
<html>
<head>
    <title>Registration Notifications</title>
</head>
<body>
   <p>Hi Coachee {{GetUserinfo($formdata['user_id'], 'username'); }},</p>
   <p>Big and happy step, your money goal is</p>
   <p>Your Goal : {{$formdata['select_focus_cat']}}</p>
   <p>Goal Amount : {{$formdata['each_month_goal']}}</p>
   <p>Goal Time : {{$formdata['archive_goal_time']}}</p>
   <p>So,</p> 
   <p>Start date: <ENTER START DATE></p>
   <p>End date: <ENTER END START></p>
   <p>Monthly Amount: {{$formdata['archive_goal_time']}}</p>

   <p>Next step -> Please login to HeyCoach to complete “knowing your spend”</p>
   <p>Don’t forget to watch the videos and opt to join a live coaching session</p>
    <p>Your current step :- <a href="{{URL::to('/step3')}}">{{URL::to('/step3')}}</a></p>
   <p>Coach Ruth</p>
</body>
</html>