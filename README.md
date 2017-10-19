# MyCMS

HTTP server is Nginx run on my own computer, OS is OpenBSD.

## Steps

- [x] CMS Core Design
- [ ] User Management
- [ ] Page management
- [ ] Design Templates
- [ ] Plugins
- [ ] Forms Plugin
- [ ] Image Gallery Plugin
- [ ] Panels and Widgets
- [ ] Building an Installer

### CMS Core Design

#### Folder .private/

We do not want anyone to visit this location, so it must be disabled in *nginx.conf*:
```
location ~* /.private/ {
  return 404;
}
```

#### Redirecting

Redirect every request to *index.php?page=REQUEST* if the path does not exist physically.
```
location / {
  rewrite ^(.*)$ /index.php?page=$1;
}
```
