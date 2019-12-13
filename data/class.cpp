#include <stdio.h>
#include <fstream>
#include <iostream>
#include <stdlib.h>
#include <unistd.h>
using namespace std;

int main()
{
	const char output_file[] = "sql\\class.sql";
	ofstream outfile;
	outfile.open(output_file);
	if (outfile.fail()) { 
		printf("failed to open output file '%s'\n", output_file);
        exit(EXIT_FAILURE);
    }
	char table[] = "class";
	char param[3][16] = { "class_id", "teacher_id", "school_id" };
	char buffer[512];
	int school_rows = 210;
    int class_rows = 4200;
    int j = 1;
    int divider = 0;
    for (int i = 1; i <= class_rows; i++) {
        if (divider % (class_rows / school_rows) == 0 && divider != 0)
            j++;
        sprintf(buffer, "insert into %s (%s, %s, %s) values (%d, %d, %d);\n", 
                table, param[0], param[1], param[2], i, i, j);
        outfile << buffer;
        memset(buffer, '\0', sizeof(buffer));
        divider++;
    }
    return 0;
}
