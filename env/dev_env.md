# Installer Vagrant
>Installez Bien ruby 2.2+ et VirtualBox avant tout ça

**MAC**

`./fixmacos.sh`

**Linux** 

```
sudo wget https://releases.hashicorp.com/vagrant/2.2.6/vagrant_2.2.6_x86_64.deb

sudo dpkg –i vagrant_2.2.6_x86_64.deb
```

**Windows**

https://releases.hashicorp.com/vagrant/2.2.6/vagrant_2.2.6_x86_64.msi


# Lancer sa VM
> Avant tout sur votre shell (git bash pour windows)

`vagrant up`

# L'environnement 
## VS code
> à réadapter selon besoin
```
{
    "protocol": "sftp",
    "host": "localhost",
    "port": 2222,
    "username": "vagrant",
    "remotePath": "/home/vagrant/www",
    "password": "vagrant",
    "passive": false,
    "interactiveAuth": false,
    "uploadOnSave": true,
    "syncMode": "update",
    "downloadOnOpen": false, 
    "watcher": {
        "files": true
        "autoUpload": false,
        "autoDelete": true
    },
    "ignore": [
        "**/.vscode/**",
        "**/.git/**",
        "**/.DS_Store"
    ]
}
```

## PHP Storm

Preferences | Build, Execution, Deployment | Deployment > new SFTP server
 
 >*Attention ! sur quel dossier PHP Storm pointe*
- Host : `localhost`
- port : `2222`
- User : `vagrant`
- Pass : `vagrant`
- Root Path : `/`

**Mapping**
- Deployment Path :  `/home/vagrant/www`
- Excluded Path :
    - `.git/`
    - `.idea/`
