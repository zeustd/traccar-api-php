# traccar-api-php (Traccar API usage with PHP)

## Transfer of ownership due to lack of time and other commitments.
Due to personal commitments and lack of time, I have collaborated with @zeustd and we have to an agreement to transfer ownership of this project to @zeustd.

Use traccar api with php, using this easy to understand implementation in php. All features provided by Traccar in version 4.3 and later will be supported.

Traccar Server & API Version : 4.3 Supported (Currently checked to be working with)

### Note: For all support and queries regarding this code, raise requests here on GitHub itself. 

# About author of This repositiory and code
- name : @zeustd


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

#  To do list for future - user-interface
- Map based tracking UI
- Geo-Fence UI
- Edit Device UI
- Playback UI
- Reports UI
- Admin User Management UI
- Admin Device Management UI
- Admin Device <-> User Allocation UI


All codes/examples are being provided here for free

* We have a fully functional list of all API functions for Traccar, of which we have shared few of the basic functionailities required to get started with PHP based implementation of Traccar API. For customizations please Raise a Request here on Github under Issues.

* Contributions to the code are most welcome and will be given due credit.

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
