#include <stdio.h>
#include <fstream>
#include <iostream>
#include <stdlib.h>
#include <unistd.h>
using namespace std;

int main()
{
	const char output_file[] = "sql\\staff_vice_principal.sql";
	const char input_file[] = "text\\viceprincipalnames.txt";
	ofstream outfile;
	ifstream infile;
	infile.open(input_file);
	outfile.open(output_file);
	if (infile.fail()) {
		printf("failed to open input file file '%s'\n", input_file);
		exit(EXIT_FAILURE);
	} else if (outfile.fail()) {
		printf("failed to open output file '%s'\n", output_file);
        exit(EXIT_FAILURE);
	}
	char table[] = "staff";
    char position[] = "Vice Principal";
	char param[3][16] = {"name", "position", "address_id"};
	char buffer[512];
	int rows = 210;
	char line[255];
	for (int i = 1; i <= rows; i++) {
		infile.getline(line, sizeof(line)/sizeof(char));
		sprintf(buffer, "insert into %s (%s, %s, %s) values ('%s', '%s', %d);\n", 
                table, param[0], param[1], param[2], line, position, i + rows);
		outfile << buffer;
		memset(buffer, '\0', sizeof(buffer));
	}
	return 0;
}
