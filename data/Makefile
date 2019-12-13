all: school class staff_principal staff_vice_principal \
	staff_teacher date student classenroll generatezips \
	address
school: school_update school_insert

school_update: school_update.cpp 
	g++ -Wall -oschool_update school_update.cpp
school_insert:	school_insert.cpp
	g++ -Wall -oschool_insert school_insert.cpp
class: class.cpp
	g++ -Wall -oclass class.cpp
classenroll: classenroll.cpp
	g++ -Wall -oclassenroll classenroll.cpp
staff_principal: staff_principal.cpp
	g++ -Wall -ostaff_principal staff_principal.cpp
staff_vice_principal: staff_vice_principal.cpp
	g++ -Wall -ostaff_vice_principal staff_vice_principal.cpp
staff_teacher: staff_teacher.cpp
	g++ -Wall -ostaff_teacher staff_teacher.cpp
date: date.cpp
	g++ -Wall -odate date.cpp
student: student.cpp
	g++ -Wall -ostudent student.cpp
generatezips: generatezips.cpp
	g++ -Wall -ogeneratezips generatezips.cpp
address: address.cpp
	g++ -Wall -oaddress address.cpp
clean: 
	rm -f *.o
	rm -f *.exe 
