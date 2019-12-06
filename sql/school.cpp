#include <stdio.h>
#include <fstream>
#include <iostream>
#include <stdlib.h>
#include <unistd.h>
using namespace std;

int main()
{
	const char output_file[] = "school_row_update.sql";
	const char input_file[] = "schoolnames.txt";
	ofstream outfile;
	ifstream infile;
	infile.open(input_file);
	outfile.open(output_file);
	if (infile.fail()) {
		printf("failed to open input file file '%s'\n", input_file);
		exit(EXIT_FAILURE);
	} else if (outfile.fail()) {
		printf("failed to open output file '%s'\n", output_file);
	}
	char table[] = "school";
	char col_target[] = "school_name";
	char param[] = "address_id";
	char buffer[512];
	int rows = 210;
	char line[255];
	for (int i = 1; i <= rows; i++) {
		infile.getline(line, sizeof(line)/sizeof(char));
		sprintf(buffer, "update %s set %s = '%s' where %s = %d;\n", table, col_target, line, param, i);
		outfile << buffer;
		memset(buffer, '\0', sizeof(buffer));
	}
	return 0;
}