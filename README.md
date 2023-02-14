<p align="center">
  <img src = "images/logo.png" width="400">
</p>

<h1 align="center">
  MAB BLOGS PHP
</h1>

<h3 align="center">
  Blog App | PHP & MySQL
</h3>


<br><br>

<p align="justify">
Users will be able to read blogs, search blogs, sort blogs by categories, and more! Users can also signup to become authors, where they can (add/edit/delete) their posts. An Admin can do all an author can do, and more. An admin will be able to (add/edit/delete) users (admin/author), manage (add/edit/delete) categories. <br>
The user first gotta do the registration into our system before using our system. While registring some fields will be given to the user to fill the data related to user. The user have to fill all the details and all th validations have been applied on the data so that the user won't be able to add the repetitive credentials all at the same time. Even if the password enetered by the user to confirm does not match then the system will keep displaying the error message to the user. For profile picture it is necessary to keep some things in mind and that is the size of the image must be less than <b>1 MB</b> and the allowed files that could be upoaded are <b>png, jpg, jpeg</b>. Once the user has successfully uploaded the data into the system's database then the user will be redirected to the login screen with some point to alert the user about the registration.<br>
Then the user can simply enter the credentails into the login page then based on their status, the user will be redirected to the dashbaord. If the user is an <b>Admin</b> then it will be redirected to dashboard with some more functionalities and if the user is <b>Simple User</b> then the user will be redirected to the simple dashboard. Also the checks on the input field have bee apllied. Some unauthenticated or unauthorized users won't be alllowed to enter into the system. <br>
If the user want to logout of the system then the user simpl have to hover to the profile picture and some drop down menu will appear. From the menu the user have to click on the <b>Logout</b> option. Then the system will destroy all the sessions created and will logout the user and redirect it to the home page of the system. Now even if the user goes to the previous page using the browser, then the system won't let the user enter into the system without actually creating a session by logging into the system. Even if the user tries to, then the system will bounce back the user to the <b>Sign In</b> page. <br>
In the Admin Panel, if the user want to add a new user then the Admin got to add all the details of the user just like the sign up page and all the checks will be validated. However, the admin also have to choose the role of the user that is going to be assigned to the user. Once the user has been added, then the user will be redirected to the <b>Manage Users</b> page where a prompt will show the admin that the user has been added. Then the list of users will be displayed to the user on this page including the new user that has just been added now at the last of the list of the users.<br>
In the Manage Users Page the admin will be able to see a list of users and will be allowed two operations to perform on these users that are Edit and Delete. In these list of users, the Admin itself won't be present. This is to safeguard the system from crashing or otherwise if the user delete itself then he\she might perform some action as the session has not been expired. So this will crash our system. If no user is present in the database, then the system will display an error message at the screen indicating the user that no user is present in the database.<br>
If the admin want to edit the information of the user then the admin can do so by clicking on the edit button in the Manage Users Page. Then the admin would be able to edit the first and last name of the user also the role of the user. The user will be notified by a prompt on the Manage User's page. <br>
Similarly if the user wishes to delete the user, the same process is repeated but with the delete button. Then the system will first delete the user's profile picture from the system memory. Then all the thumbnail's of the user's post will be deleted from the system memory. Then the user will be deleted from the database and the page will be refreshed. And a prompt will tell the user about the action performed. Whether it was a success or not.<br>
Now moving on to the categories, the user can click on the Add Category page and then the system will take it to input some details of the new caetgory. The similar checks has been allowed on the data and the user will prompted with error message on the wrong input. On completion, the user will be redirected to the Manage Categories Page. If there is category there, then the system will be displaying some error message. But once u added the acetgory, the system will prompt the name of the category indicating the user that the category has been added into the system. A list of categories will be present on the Manage Categories Page and all sorted in the ascending order of the title of the category. The user can then be allowed to edit the category by simply selecting the category that need alteration and then click on the edit button. After that add the details, if the check is passed then the category will be updated and system will prompt the message. Also, one category wont be listed on the panel that is <b>Uncategorized</b> as this is the default  category that is going to be used by the system and should not be provided with the alterations. Also a single click operation can delete the category and all the posts that will be under this category will be transfered to the 'Uncategorized Category'.

</p>


<br><br>
<!-- ................................................................................................................................. -->


### Features
<br>
Following are some of the new features and learning encountered while creating this amazing project:

- To make the code reusable by making partials of the code and then simply requiring it in multiple files where required.
- Holding back the users from accessing the action modified pages through filtering the requests and bouncing back the failed requests to the original page of transmission.
- Using forms in PHP
- Using form validation for mitigating the erroneous data.
- Data Encryption and hashing to store credentials in the database
- Securing the system by applying checks at multiple points
- Authorization by applying different roles into the systems
- Interactive Dashboard to perform different functionalities
- Access Control Mechanisms


<br><br>
<!-- ................................................................................................................................. -->


### Resources
<br>
Follwing resources have been used in maintaining this project:

- [Iconscout Library](https://iconscout.com/unicons/getting-started/line) has been used to import icons for different purposes.
- [Google Fonts](https://fonts.google.com/specimen/Montserrat?query=mont) has been used to import the <strong>Monteserrat</strong> font.


<br><br>
<!-- ................................................................................................................................. -->


### Demo
<p align="justify">
  The Demo of this working portfolio can be found on <br>
  [https://rebrand.ly/](https://rebrand.ly/ )
</p>


<br><br>
<!-- ................................................................................................................................. -->



### Video
<p align="justify">
You can exclusively watch the video on this project from the making to deploying on my     channel with the link given below<br>

  [Video Link](# ) <br>

  If you like my video then do Like the Video and share it with others.
</p>


<br><br>
<!-- ................................................................................................................................. -->



### GUI
![GUI for this Project](path)


<br><br>
<!-- ................................................................................................................................. -->




### Technology Stack
<br>
Follwing technologies have been used at the core of this application to make it stand in the market place:

- HTML
- CSS
- JS
- PHP


<br><br>
<!-- ................................................................................................................................. -->




### IDE
<br>
Visual Studiio Code is used in coding. Following extension ar downlaoded while working this project

- PHP Intelephense
- Bracket Pair Colorization
- PHP Server
- Liver Server


<br><br>
<!-- ................................................................................................................................. -->


### Advancement

> Similar Category can be added more than one time, this should not happen specially in the blog sites. 
> User is not able to reset its own password.

<br><br>
<!-- ................................................................................................................................. -->


### Deployment Details

The website is deployed using the free hosting provided by **Vercel**
<p align = "center">
  <img src = "https://branditechture.agency/brand-logos/wp-content/uploads/wpdm-cache/Vercel-900x0.png" width = "300">
</p>
<br><br>
Later on the link was customized using the well-known URL shortener and customizer **Rebrandly**:<br><br>
<p align = "center">
  <img src = "https://www.rebrandly.com/images/URL-Shortener.fileextension.svg" width = "300">
</p>


<br><br>
<!-- ................................................................................................................................. -->


### Developer

Muhammad Abdullah Butt <br>
abdullahbutt12292210@gmail.com <br>
> [Instagram](https://www.instagram.com/abdullah.butt.22/)<br>
> [FaceBook](https://www.facebook.com/profile.php?id=100076291614529)<br>
> [YouTube](https://www.youtube.com/channel/UCnuOFQyMywg-KuoN-lmav1Q)<br>
> [Portfolio](https://rebrand.ly/MuhammadAbdullahButt_MABCORP)<br>
> [Project Displayer]( https://rebrand.ly/ProjectDisplayer_MABCORP)
<br><br>
<!-- ................................................................................................................................. -->
