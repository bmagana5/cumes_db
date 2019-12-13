#include <stdio.h>
#include <fstream>
#include <iostream>
#include <stdlib.h>
#include <unistd.h>
#include <time.h>
using namespace std;

int main()
{
    srand(time(NULL));
	const char output_file[] = "sql\\student.sql";
	const char input_file[3][32] = {"text\\studentnames.txt", 
                                 "text\\date.txt", 
                                 "text\\parentnames.txt"};
	ofstream outfile;
	ifstream infile[3];
	infile[0].open(input_file[0]);
	infile[1].open(input_file[1]);
	infile[2].open(input_file[2]);
	outfile.open(output_file);
	if (infile[0].fail()) {
		printf("failed to open input file file '%s'\n", input_file[0]);
		exit(EXIT_FAILURE);
	} else if (infile[1].fail()) {
		printf("failed to open input file file '%s'\n", input_file[1]);
		exit(EXIT_FAILURE);
    } else if (infile[2].fail()) {
		printf("failed to open input file file '%s'\n", input_file[2]);
		exit(EXIT_FAILURE);
    } else if (outfile.fail()) {
		printf("failed to open output file '%s'\n", output_file);
        exit(EXIT_FAILURE);
	}
	char table[] = "student";
	char param[6][32] = {"student_name", "date_of_birth", "parent", 
                        "primary_language", "language_at_home", "address_id"};
	char buffer[1088];
	int rows = 126000;
    char language[12][16] = {"English", "Spanish", "French", "Punjabi",
                            "German", "Tagalog", "Chinese", "Hindi", 
                            "Russian", "Italian", "Korean", "Gujarati"};
	char date[255];
    char name[255];
    char parent[255];
    int address_offset = 4830;
	for (int i = 1; i <= rows; i++) {
		infile[0].getline(name, sizeof(name)/sizeof(char));
		infile[1].getline(date, sizeof(date)/sizeof(char));
		infile[2].getline(parent, sizeof(parent)/sizeof(char));
		sprintf(buffer, 
                "insert into %s (%s, %s, %s, %s, %s, %s) values (\"%s\", \"%s\", \"%s\", \"%s\", \"%s\", %d);\n", 
                table, param[0], param[1], param[2], param[3], param[4], param[5], 
                name, date, parent, language[rand() % 12], language[rand() % 12], i+address_offset);
		outfile << buffer;
		memset(buffer, '\0', sizeof(buffer));
	}
	return 0;
}
