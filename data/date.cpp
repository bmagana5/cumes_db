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
	const char output_file[] = "text\\date.txt";
	ofstream outfile;
	outfile.open(output_file);
	if (outfile.fail()) { 
		printf("failed to open output file '%s'\n", output_file);
        exit(EXIT_FAILURE);
    }
	char buffer[512];
    int rows = 126000;
    int year[] = { 2017, 2018, 2019 };
    int month[] = { 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 };
    int day[] = { 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 
                11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 
                21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 
                31 };
    for (int i = 1; i <= rows; i++) {
        int y = year[rand() % 3];
        int m = month[rand() % 12];
        int d = day[rand() % 31];
        if (m == 2 && d > 28) {
            d = 28;
        }
        else if (d > 30) {
            switch (m) {
                case 4:
                case 6:
                case 9:
                case 11: d = 30;
                        break;
                default:
                        break;
            }
        }
        sprintf(buffer, "%4d-%02d-%02d\n", y, m, d);
        outfile << buffer;
        memset(buffer, '\0', sizeof(buffer));
    }
    return 0;
}
