#include <fstream>
#include <stdlib.h>
#include <stdio.h>
using namespace std;

int main() 
{
    const char filename[] = ".\\text\\zipcodes.txt";
    ofstream outfile;
    outfile.open(filename);
    if (outfile.fail()) {
        printf("cannot open file '%s'\n", filename);
        exit(EXIT_FAILURE);
    }
    int zip = 90001;
    int i = 0;
    int max = 6161;
    while (i <= max) {
        int tmp = zip + i;
        char buffer[16];
        sprintf(buffer, "%d\n", tmp);
        outfile << buffer;
        i++;
    }
    outfile.close();
    return 0;
}
