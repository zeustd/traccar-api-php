# traccar-api-php (Traccar API usage with PHP)

Note : New version and changes to API will be implemented in the coming weeks starting October 2018, which will include better examples and better integrations.

Use traccar api with php, using this easy to understand implementation in php. All features provided by Traccar in version 3.15 and later will be supported.

Traccar Server & API Version : 4.3 Supported

# About Traccar
- web: www.traccar.org
- Traccar API : https://www.traccar.org/api-reference/

# Features Implemented
*Server
- server (server configurationgs)

*Session
- loginAdmin (login as admin)
- login (login as any user)
- logout (logout / destroy a user session)
- session (check a users session or users account details)

*User
- users (list all user accounts under the currently logged in user)
- userAdd (add / register a user account)
- userUpdate (update a user account)
- userDelete (delete a user account)

*Device
- devices (list all devices under the currently logged in user)
- deviceAdd (add a device)
- deviceUpdate (update a device)
- deviceDelete (delete a device)

*Geofence
- geofences (list all geofences under the currently logged in user)
- gefeonceAdd (create a geofence)
- geofenceUpdate (update a geofence)
- geofenceDelete (delete a geofence)

*Notification
- notificationsTypes (list all notifications types available)
- notifications (list all users enabled notifications)
- notificationAdd (create  notification for user)
- notificationUpdate (update notification)
- notificationDelete (delete notification)

*Permission
- assignUserDevice (assing a device to a user account)
- removeUserDevice (remove a device from a user account)
- assignDeviceGeofence (assign a geofence to a device)
- removeDeviceGeofence (remove a geofence assignment from device)
- assignDeviceNotification (assign a notification to device)
- removeDeviceNotification (remove a notification from device)

*Position
- positions (display recent positions of all devices under the logged in user)
- position (display a single position based in positionId)

*Report
- reportSummary (summary report)
- reportTrips (trips report)
- reportStops (stops report)
- reportRoute (route report)
- reportEvents (events report)
- reportChart (same as route report, but can be modified for specifics in future)
- reportEventsType (specific event type report)

*Command
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


All codes/examples are being provided here for free by www.yodiyil.com

* We have a fully functional list of all API functions for Traccar, however we are re-working on the codes and improving them to accomodate new changes that has been implemented in Traccar. And also to be in line with our intentions to launch sample UI Interfaces by Mid March 2018.

* Contributions and Pull Requests are most welcome and will be given due credit.
