#include <stdio.h>
#include <stdlib.h>
#include <fstream>
#include <time.h>
#include <string.h>
using namespace std;

int main()
{
    const char file1[] = ".\\text\\address.txt";
    const char file2[] = ".\\text\\addresscity.txt";
    const char file3[] = ".\\text\\addresscounty.txt";
    const char file4[] = ".\\text\\zipcodes.txt";
    const char out[] = ".\\sql\\address.sql";
    ifstream infile[4];
    ofstream outfile;
    infile[0].open(file1);
    infile[1].open(file2);
    infile[2].open(file3);
    infile[3].open(file4);
    outfile.open(out);
    if (infile[0].fail()) {
        printf("failed to open '%s'\n", file1);
        exit(EXIT_FAILURE);
    } 
    else if (infile[1].fail()) {
        printf("failed to open '%s'\n", file1);
        exit(EXIT_FAILURE);
    } 
    else if (infile[2].fail()) {
        printf("failed to open '%s'\n", file1);
        exit(EXIT_FAILURE);
    } 
    else if (infile[3].fail()) {
        printf("failed to open '%s'\n", file1);
        exit(EXIT_FAILURE);
    } else if (outfile.fail()){
        printf("failed to open '%s'\n", out);
        exit(EXIT_FAILURE);
    }
    // ---------------------------------------------------------------------------------
    // ZIP CODES
    int zipcount = 0;
    char zipbuf[16];
    while (!infile[3].eof()) {
        infile[3] >> zipbuf;
        zipcount++;
    }
    infile[3].close();
    infile[3].open(file4);
    if (infile[3].fail()) {
        printf("failed to open '%s'\n", file1);
        exit(EXIT_FAILURE);
    } 
    int zip[zipcount];
    int i = 0;
    // fill zipcode table
    while (!infile[3].eof()) {
        infile[3] >> zipbuf;
        zip[i] = atoi(zipbuf);
        //printf("%d\n", zip[i]);
        i++;
    }
    infile[3].close();
    // -------------------------------------------------------------------------------
    // CITY
    int citycount = 0;
    char citybuf[70];
    while (!infile[1].eof()) {
        infile[1].getline(citybuf, sizeof(citybuf)/sizeof(char));
        citycount++;
    }
    infile[1].close();
    infile[1].open(file2);
    if (infile[1].fail()) {
        printf("failed to open '%s'\n", file1);
        exit(EXIT_FAILURE);
    } 
    char city[citycount][70];
    int j = 0;
    // fill city table
    while (!infile[1].eof()) {
        infile[1].getline(citybuf, sizeof(citybuf)/sizeof(char));
        sprintf(city[j], "%s", citybuf);
        printf("%s\n", city[j]);
        j++;
    }
    infile[1].close();
    // -------------------------------------------------------------------------------
    // COUNTY
    int countycount = 0;
    char countybuf[50];
    while (!infile[2].eof()) {
        infile[2].getline(countybuf, sizeof(countybuf)/sizeof(char));
        countycount++;
    }
    infile[2].close();
    infile[2].open(file3);
    if (infile[2].fail()) {
        printf("failed to open '%s'\n", file1);
        exit(EXIT_FAILURE);
    } 
    char county[countycount][50];
    int k = 0;
    // fill city table
    while (!infile[2].eof()) {
        infile[2].getline(countybuf, sizeof(countybuf)/sizeof(char));
        sprintf(county[k], "%s", countybuf);
        k++;
    }
    infile[2].close();
    // -------------------------------------------------------------------------------
    srand(time(NULL));
    // database table name
    char table[] = "address";
    // columns in the table
    char column[][16] = {"street_address", "city", "state", "zip", "county"};
    char street_address[255];
    char state[] = "CA";
    char bigbuf[1024];
    while (!infile[0].eof()) {
        infile[0].getline(street_address, sizeof(street_address)/sizeof(char));;
        //printf("%s\n", street_address);
        sprintf(bigbuf, "INSERT INTO %s (%s, %s, %s, %s, %s) VALUES (\"%s\", \"%s\", \"%s\", \"%d\", \"%s\");\n", 
                table, column[0], column[1], column[2], column[3], column[4],
                street_address, city[rand() % citycount], state, zip[rand() % zipcount],
                county[rand() % countycount]);
        outfile << bigbuf;
        memset(street_address, '\0', sizeof(street_address));
        memset(bigbuf, '\0', sizeof(bigbuf));
    }
    infile[0].close();
    outfile.close();
	return 0;
}
