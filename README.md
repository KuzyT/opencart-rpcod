# RP COD
Russian Post Cash on Delivery Forms (113 and 117) for OpenCart 2.x. It could form 2 COD forms in `*.docx`. There are several other modules covering this functionality, but to someone like me can be enough these two forms.

## Demo
You can test this module on [http://opencart.kuzyt.com](http://opencart.kuzyt.com)
```
Login: demo
Password: demo
```

## Requirements
1. ZipArchive PHP Library (PHP 5.2+)
2. OpenCart 2.x (OpenCart 2.0.2.0, OpenCart 2.0.1.1, OpenCart 2.0.1.0 and OpenCart 2.0.0.0)
3. [VQmod](https://github.com/vqmod/vqmod/tree/opencart) installed

## Installation
1. Copy the contents of this package to your OpenCart installation keeping the folder structure
2. Login to the OpenCart admin section and go to `Extensions` => `Modules`
3. Find `RP COD` in the list of modules
4. Click `Install` and then `Edit` the module settings
5. Add a new `Profile`, set `Status` to `Enable` and `Save`
6. Add other Profiles, if necessary

## Usage
1. Go to `Sales` => `Orders` or `Latest Orders` from the `Dashboard`
2. `View` your order and then click `RP COD` near `Print Invoice`
3. Choose required `Profile`. Profiles with `Default` setting has higher priority
4. Check the form and click `Forms 113 and 117`
5. Open or save docx file

### P.S.
I started programming 10 years ago, but this is the first script that I published =)
