# afterlogic-authlog

Patch for afterlogic webmail lite to log failed authentication requests.

## Compatibility

- Currently compatible and tested with afterlogic webmail lite version 7.5.0

## Installation

- Download the patch `Actions.php.patch` and the extension php library `log.php`
- Apply the patch: `patch <afterlogic-root>/libraries/ProjectSeven/Actions.php < Actions.php.patch`
- Create the directory `<afterlogic-root>/libraries/log/`
- Install the extension library to `<afterlogic-root>/libraries/log/log.php`

## Configuration

- Insert the appropriate log location in `log.php` on line 15 (default is `/var/log/afterlogic/auth.log`)

## Functionality

### Log Syntax

Log syntax is the following:

`<date> <hostname> afterlogic: login failure for user <username> with ip <ip>`

### Fail2Ban

Additionaly you can configure a fail2ban filter to block malicious clients based on there ips by downloading and installing `afterlogic.conf` to `/etc/fail2ban/filter.d/`. Afterwards you need to adjust `/etc/fail2ban/jail.local` to include the given filter with parameters that fit you needs.

Finally restart fail2ban to go live with your configuration: 

`service fail2ban restart`
