# Location to ZipCode API - JQuery ZipCode Autocompletion #

This is a sample web project of how to implement a zip code autocomplete field.
 
The user starts writing a city name or zip code (postal code) and then a tooltip shows up with the matching cities.

![screenshot](https://k60.kn3.net/1/5/F/7/3/7/0C1.jpg)

This sample is only for US cities

THE SERVER NEEDS **PHP** TO RUN


## Installation ##

Clone this project and run:
```bash
   bower install
   ``` 


## Running the demo ##
You can run this demo using the php built-in server:    
   
```bash
   php -S localhost:8081
   ``` 

And then open http://localhost:8081 in your browser
    
## Customization ##

The data comes from a csv file downloaded from here: http://federalgovernmentzipcodes.us/

The data is sent as a plain JSON document back and forth, implementing security strategies is up to you.

We are using this plugin for the form autocompletion:

[https://github.com/Pixabay/jQuery-autoComplete](https://github.com/Pixabay/jQuery-autoComplete)

Thanks @Pixabay ! and the people behind federalgovernmentzipcodes.us (Daniel S. Coven's ? )
