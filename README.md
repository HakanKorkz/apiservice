# apiservice
It helps to provide API support to projects. It is Simple, Safe and Fast.

## Setup
After downloading the project, update your database username and password in the `index.php` file. Make sure you don't have a database named `apiservice` before.

If you want to change your database name, update `apiservice` with the new database name in the files in the directory below.
`app/migration/backups`.

## Get started
1) Partners, Branches and Products are listed in the main directory `/` . You can get the Token and Partner name here.
2) Clients should send parameters named "partner_name" and "partner_token" to `api` via "POST" method. `csrf` must be turned off in the firewall for external access. For more information, you can review the [Mind](https://github.com/aliyilmaz/Mind/) documentation.
3) To help you, some rules have been defined on the firewall, know that you don't have to use it like that.
4) You can use `apiservice/test/api` for an example client scenario.

## Creating a new partner
Type `apiservice/new_partner` in the address line and enter, fill out the form.

## Creating a new branch
Type `apiservice/new_branch` in the address line and enter, fill out the form.

## Creating a new product
Type `apiservice/new_product` in the address line and enter, fill out the form.

## Take backup
Type `apiservice/backup` in the address line and download the file.

## Restoring the backup
Accessing the Home Directory already restores the backup. This route is to show you how you can restore the backup externally.
Type `apiservice/restore` in the address line and restore the file.

## install
You can use it to create database and tables without demo content.
Type `apiservice/install` in the address line and create the database requirements for the project. Remember to remove the `app/migration/restore` parameter defined to the `/` (home directory) route before using this option.


## Disclaimer
All responsibility belongs to you when using this application. It is recommended not to commission the codes without examining and testing the codes.

## License
The project files in this directory are shared under the GPL3 license.

>Copyright (C) 2021, Ali Yılmaz and contributors
>
>This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
>
>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
>
>You should have received a copy of the GNU General Public License along with this program. If not, see https://www.gnu.org/licenses/.`