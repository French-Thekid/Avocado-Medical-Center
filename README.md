# Avocado-Medical-Center
This is a website for a medical center (AMC) that provides all services outline by the company

Scenario:

A medical centre, Avocado Medical Centre, is has hired you to develop a website to digitize their record keeping. Currently, patients have a folder with records of visits and procedures. The centre desires for you to develop a web system, which could then be deployed to other branches, should they expand.
Building from the Individual Assignment, Avocado Medical Centre also desires to be able to register accounts to each staff member. There would be different privileges for each user type (nurses, doctors, administrators).
Guests would only be able to view the opening hours and contact information as well as the services, in detail, offered by the Medical Centre. Other information would include years of service and Mission Statement, etc.

USER FUNCTIONALITY
Guest:
-	View the website, see services, calculate BMI.
-	Login (successful if part of staff)
- 	make appointment (first and last name, date)
Nurse: (performs functions of Guest and the following)
-	Login (Staff ID or Email Address and Password)
-	Edit profile (Password, email address, telephone number, mailing address)
- 	Register and Log when a patient comes in for a doctor visit
-	Search patients’ records based on first or last name.
-	Search for and view appointments, and edit appointment status.
Doctor: (performs functions of Nurse and the following)
-	add reason for visits to each patient on the day of visit.

Administrator: (manages all accounts:)
-	Add, Edit, Delete User Accounts.

WEBSITE:
Based on the user type, some options should not be visible. Put in place the 	proper validation, displays and redirection if a user does not have the user rights 	to enter a particular page.

 
DATABASE: Create a database “avocadoMC_DB” with the following tables:
Staff (StaffID, Name, Email, Password, Type (Nurse/Doctor/Administrator)
Patient: (PatientTRN, Title, First Name, Last Name, Date of Birth, Address, 				TelNo., Email)
Appointment: (PatientTRN, StaffID, Date, ReasonForVisit, Status)
*StaffID is for the current doctor signed in.
*Status is either: pending, cancelled, or complete

