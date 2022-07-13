[![CodeFactor](https://www.codefactor.io/repository/github/eglodevelopment/nymi/badge/main)](https://www.codefactor.io/repository/github/eglodevelopment/nymi/overview/main)


## Intro

This is the Nymi Cloud Platform, thats pretty much it, lol.

## About

Here at Nymi (Eglo Development) we want to provide free cloud storage for all, without the small limits, in current times, 15GB won't get you far, which is why we are
are giving 100GB of free storage to everyone, but there is always a catch, right? You're not wrong, the only catch is ads, we display ads on the upload page and
other pages, these ads are unobtrusive and are only there so we can provide the best storage for free.

## Thank you

Nymi (Eglo Development) thanks you for being patient, this storage solution was made in ~6 months, so it will not compare to cloud storage that has been around for
over 10 years. But eventually we will get to a point where we are able to hold our own and be comparable to other providers, until then, we thank you for your patience.

## Installation

The cloud service itself is really easy to install, but setting up the database will be a bit of a struggle.



1. Run ```git clone https://github.com/EgloDevelopment/Nymi.git``` in the direectory you want to install Nymi in.

2. Extract the files from the ```nymi``` folder into your main directory.

3. Open ```resources/DB/config.php``` and set the values to your database credentials.

4. Go to ```resources/DB``` and find the ```config.sql``` file.

5. Create a new databse named ```nymi``` and go to the import tab and click ```choose file``` (PHPMyAdmin).

6. Upload the ```config.sql``` file.

7. Scroll down and click ```Do not use AUTO_INCREMENT for zero values``` and set it to ```no``` (PHPMyAdmin).

8. Click ```import``` and wait for it to finish, the database should now be setup.

9. Go to the ```settings``` table inside the new database and set ```url``` to your servers url.

10. Run your server and go to ```server-url/register``` and input your credentials.

11. Go to ```server-url/login``` and login with your credentials.

12. Nymi should now be installed and ready to use, if you have any errors please email ```contact@eglo.pw```.



