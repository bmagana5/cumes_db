#include <stdio.h>
#include <fstream>
#include <iostream>
#include <stdlib.h>
#include <unistd.h>
using namespace std;

int main()
{
	const char output_file[] = "sql\\enroll.sql";
	ofstream outfile;
	outfile.open(output_file);
	if (outfile.fail()) { 
		printf("failed to open output file '%s'\n", output_file);
        exit(EXIT_FAILURE);
    }
	char table[] = "classenroll";
	char param[4][16] = { "class_id", "student_id", "disp_notes", "grade"};
	char buffer[512];
    int class_rows = 4200;
    int student_rows = 126000;
    int j = 1;
    int divider = 0;
    char grade[] = "ABCDF";
    for (int i = 1; i <= student_rows; i++) {
        if (divider % (student_rows / class_rows) == 0 && divider != 0)
            j++;
        sprintf(buffer, "insert into %s (%s, %s, %s, %s) values (%d, %d, '', '%c');\n", 
                table, param[0], param[1], param[2], param[3], j, i, grade[rand() % 5]);
        outfile << buffer;
        memset(buffer, '\0', sizeof(buffer));
        divider++;
    }
    return 0;
}
