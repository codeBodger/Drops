Version v1.0.0-alpha.5 2023-01-08 21:00:13 UTC

# Installing the App
- Note: This does not actually install anything anywhere.  It is simply a way (the
supported way) to use the app, so don't worry about your school's/company's policy
prohibiting the instalation of software.  
1. To install the app for yourself, you will first need to create a
[repl.it](https://repl.it) account.  If you allready have one, you can skip this step.
2. Then, go to [this link](https://replit.com/@RowanAckerman/Quiz) and click the blue
`Fork Repl` button on the right side of the screen. This will make a copy of the app in
your account.
3. Once you make a password (see __Passwords__ below), you will be able to use the app
anywhere, you just need to log in to your repl.it account and run it (see __Running the
App__ below).

# Running the App
- To run the app, simply hit the green `Run` button at the top of the screen.  
- To view the app larger, press the expand/open in new tab button to the right of the
mini URL bar.

# Passwords
## Creating and Resetting a Password
1. To create or change your password, click the "Shell" tab in the right hand pannel.
2. Type `./pswd.sh` and press enter.
3. Type you current password as prompted and press enter (if you don't have one, you
won't be prompted to do this).
4. Then type a new password twice as prompted.  
- If you forget your password, you can simply delete `password.hash` and run `./pswd.sh`
again.
## Using Your Password
- Without a password, you cannot use the app.
- You must type your password in before using the app.
- You will stay logged in until you press `Log Out` in the main menu or change your
password.

# Feature Requests, Bug Reports, Questions, etc.
- Please request features, report bugs, ask questions, etc in the
[issues tab](https://github.com/codeBodger/Quiz/issues) for this app's
[GitHub repository](https://github.com/codeBodger/Quiz).  You will need to create a
GitHub account to do this.  

# Updates
1. To update the app to the latest version, click the "Shell" tab in the right hand
pannel.
2. Then type  `./update.sh` and press enter.
3. When prompted, type the number corresponding to the version you want to install.  For
now, you should choose alpha (option 2), unless you know what you're doing.  
- When there's a new update, you'll get a message when you load the web page.  

# Releases
- If you are using a release from GitHub, good luck.  You'll need to be able to run PHP
and you'll need to make the shell scripts executable.  
