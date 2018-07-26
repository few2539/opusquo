# CMS-LARAVEL (Client)

#### Server Requirement
* Composer
* PHP >= 7
* curl
* Image Optimization Modules
    * pngquant
    * gifsicle
    * jpegoptim
* Thumbnail Generator    
    * gd
    * exif

#### CMS Installation

1. Run commands below at base directory:  

    ```
    composer install
    npm install
    ```  
2. If folder `storage` doesn't exist, create one at base directory like structure below:
* storage
    * app
    * framework
        * cache
        * sessions
        * views
    * logs
3. Create `.env` file if none exists manually or using a command below:  

    ```
    composer run post-root-package-install
    ```  
4. Setup `.env` content:
* APP_URL...
* APP_DEBUG=false
* Edit CMS_API_DOMAIN=http:...
* Edit CMS_FORM_TOKEN=...
5. Setup `config/cms.php` accordingly.
6. Change permissions of `public/` and `storage/` using a command below:  

    ```
    sudo chmod -R 777 public/
    sudo chmod -R 777 storage/
    ```  
7. Restart server (optional)  

    ```
    sudo service apache2 restart
    ```

#### SEO and Image Optimization
For apache2 server, activate these mods with command:
```
sudo a2enmod rewrite headers deflate setenvif filter mime expires
```

#### Image optimization
```
sudo apt-get install pngquant gifsicle jpegoptim
```
**Note:** If the server cannot installed those plugins above, the image optimizer will not effect the uploading images.

#### Thumbnail generator
* [gd](http://php.net/manual/en/image.installation.php)
* [exif](http://php.net/manual/en/exif.installation.php)