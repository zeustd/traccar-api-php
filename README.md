# traccar-api-php (Traccar API usage with PHP)

This is a PHP class developed to interface with Traccar's API
If you have a Traccar Instance and would like to have Native PHP based access to the API's you can use this project.
This project will always remain free.

Traccar Server & API Version : 4.3 Supported (not tested for Traccar v5.0 +)

### Transfer of ownership/History:
This project was setup in March of 2018 and operated by user @jaimzj
The project is now owned and managed under the github account @zeust
We are working towards refactoring the whole code and to add more support and features in the near future.

### Note: For all support and queries regarding this code, raise requests here on GitHub itself. 

# About Traccar
- web: www.traccar.org
- Traccar API : https://www.traccar.org/api-reference/


# Features Implemented
**Server**
- server (server configurations)

**Session**
- loginAdmin (login as admin)
- login (login as any user)
- logout (logout / destroy a user session)
- session (check a users session or users account details)

**User**
- users (list all user accounts under the currently logged in user)
- userAdd (add / register a user account)
- userUpdate (update a user account)
- userDelete (delete a user account)

**Device**
- devices (list all devices under the currently logged in user)
- deviceAdd (add a device)
- deviceUpdate (update a device)
- deviceDelete (delete a device)

**Geofence**
- geofences (list all geofences under the currently logged in user)
- gefeonceAdd (create a geofence)
- geofenceUpdate (update a geofence)
- geofenceDelete (delete a geofence)

**Notification**
- notificationsTypes (list all notifications types available)
- notifications (list all users enabled notifications)
- notificationAdd (create  notification for user)
- notificationUpdate (update notification)
- notificationDelete (delete notification)

**Permission**
- assignUserDevice (assing a device to a user account)
- removeUserDevice (remove a device from a user account)
- assignDeviceGeofence (assign a geofence to a device)
- removeDeviceGeofence (remove a geofence assignment from device)
- assignDeviceNotification (assign a notification to device)
- removeDeviceNotification (remove a notification from device)

**Position**
- positions (display recent positions of all devices under the logged in user)
- position (display a single position based in positionId)

**Report**
- reportSummary (summary report)
- reportTrips (trips report)
- reportStops (stops report)
- reportRoute (route report)
- reportEvents (events report)
- reportChart (same as route report, but can be modified for specifics in future)
- reportEventsType (specific event type report)

**Command**
- commandsTypes (list of all available commands for the device)
- commandSend (send command to a device)

### If you would like to contribute towards the improvement of this proejct, please do contact me or post a request under issues.


## Donations
If you are considering donating to this project, I would like to thank you for the support.

We have 2 options for donations, You can choose between the one time fixed value donation, where you can choose an amount of your choice or opt for the recurring donation which will be an automated monthly recurring donation of fixed value.

### Recurring Donation: 
Click [DONATE HERE](https://buy.stripe.com/4gw9BK5Z60HQ2WceUX) to donate monthly

or scan

<img src="https://user-images.githubusercontent.com/75146431/207718798-6178acb5-a4ae-4a5e-b537-1790d37fc778.png" width="150">


### One Time Donation:
Click [DONATE HERE](https://donate.stripe.com/3cs29i4V28ai2Wc6oq) to donate. 

or scan

<img src="https://user-images.githubusercontent.com/75146431/207718423-affaf484-0d93-4914-b7af-2624a88ecc56.png" width="150">
