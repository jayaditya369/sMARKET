# sMARKET
A Digital Market Place for FreeLancers
Site : http://smarket.kakaral.myweb.cs.uwindsor.ca/


To Use this project
Step - 1 : Import the SQL file in the phpmyAdmin to create the database and tables with the required fields.
Step - 2 : Upload all the files into the web location.
Step - 3 : Set the index.html file  as the first page since it is the login page.


Project Description:
Any User can create and use this site for free with some limitations.
    Features for the users:
      1. Any user can publish only 2 posts, after reaching the limit they has to upgrade their account.
      2. Any user can register as freelancer and update their details for free.
      3. Any user can hire freelancers for free.

FILES AND THEIR FUNCTIONS

Untitled-1.png is the logo of the website.

index.html is the main login page to go into the website
login_page.php is used to check the user has an account by checking in the database.
signup_page.php is used to insert the user details inside the database.
loginpage.css is the styles file for the index.html
           
homepage.php is the home page of the webiste it will open if you successfully logged in.
              In this page the user can create a job by writing the post,
              by clicking on the writepost button on left side navigation bar.
              Any registered freelancer can respond to the posts in this page.
addpost.php is used to the save the post details in the database.
respond.php is used to save the freelancer details who had responded to the particular post.
homepage.css is the styles file for the homepage.php

freelancer.php is the second page & can be opened from the menu bar on the top of every page.
                In this page any user can register as Freelancer by clicking on the register button.
                Any employee can hire the freelancers for the jobs by clicking on the hire button.
freelancerreg.php is used to store the freelancer details in the database.
hire.php is used to store the employee details who hired the freelancers.
freelancer.css is the styles file for the freelancer.php

categories.php is the third page & can be opened from the menu bar on the top of every page.
                In this page every user can see the responses for theirs posts and the hired persons list.
responses.css is the styles file for categories.php

myaccount.php is the last page in the menu bar which is visible on the top of every page.
                In this page every freelancer can update and delete their details which were enetered while registeration.
                Every user can view all their published posts here by clicking on My Posts button.
                Every user can delete all the published posts here by clicking on delete all published posts button.
                Every user after reaching the max limit they can upgrade their account to increase the posts limit 
                                        to 10 more by entering the coupon here by clicking on Apply coupon button.
deletefreelanceraccount.php is used to delete the freelancer account from the database.
deleteposts.php is used to delete all the published posts of the user.
upgradeaccount.php is used to check the coupon number is present in the database or not.
myaccount.css is the styles file for myaccount.php

developers.php is used to display the developer's details of this site.

services.php is used to show the services offered by this site.

help.php is used to show the step by step procedures of all the services offered by this site.

createcoupon.php is for admin to add more coupons into the database.
                

