#include <stdio.h>
#include <fstream>
#include <iostream>
#include <stdlib.h>
#include <unistd.h>
using namespace std;

int main()
{
	const char output_file[] = "sql\\school_insert.sql";
	const char input_file[] = "text\\schoolnames.txt";
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
	char param[][16] = {"school_name", "address_id"};
	char buffer[512];
	int address_start = 130831;
	char line[255];
	int i = 0;
	while (!infile.eof()) {
		infile.getline(line, sizeof(line)/sizeof(char));
		sprintf(buffer, "INSERT INTO %s (%s, %s) VALUES (\"%s\", %d);\n", table, param[0], param[1], line, i + address_start);
		outfile << buffer;
		memset(buffer, '\0', sizeof(buffer));
        i++;
	}
	return 0;
}
