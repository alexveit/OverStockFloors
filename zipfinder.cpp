#include <iostream>
#include <fstream>
#include <string>
#include <vector>
#include <algorithm>
using namespace std;

#define GET_ZIPS

#ifdef GET_ZIPS

string get_zip(string line)
{
	unsigned init = 0;
	unsigned count = 0;
	string zip = "";
	for(unsigned i = 0; i < line.size(); i++)
	{
		if(line[i] >= '0' && line[i] <= '9')
		{
			count++;
			
			if(init == 0)
				init = i;
				
			if(count == 5)
			{
				zip = line.substr(init,5);
				if(zip[0] == '1')
					zip = "";
				break;
			}
		}
		else
		{
			init = 0;
			count = 0;
		}
	}
	return zip;
}

int main(int, char*[])
{
	string line;
	string zip;
	ifstream myfile ("asfad.csv");
	vector<string> vec;
	if (myfile.is_open())
	{
		while ( myfile.good() )
		{
			getline (myfile,line);
			zip = get_zip(line);
			if(zip.compare("30041") == 0)
			{
				cout << line << endl;
				vec.push_back(line);
			}
		}
		myfile.close();
	}
	
	ofstream myfile2;
	myfile2.open ("30041.txt");
	
	for(unsigned i = 0; i < vec.size(); i++)
	{
		myfile2 << vec[i] << endl;
	}
	
	myfile2.close();
	return 0;
}

#else

struct myzip
{
	string zip;
	unsigned count;

};

bool comparestuff (const myzip& a1,const myzip& a2)
{
	return (a1.count>a2.count);
}

int main(int, char*[])
{
	string line;
	string zip;
	ifstream myfile ("zips.txt");
	vector<myzip> zips;
	myzip mz;
	if (myfile.is_open())
	{
		while ( myfile.good() )
		{
			getline (myfile,line);
			if(zips.size() == 0)
			{
				mz.zip = line;
				mz.count = 1;
				zips.push_back(mz);
			}
			else if(zips.back().zip.compare(line) == 0)
			{
				zips.back().count++;
			}
			else
			{
				mz.zip = line;
				mz.count = 1;
				zips.push_back(mz);
			}
		}
		myfile.close();
	}
	
	
	sort(zips.begin(), zips.end(), comparestuff);
	
	ofstream myfile2;
	myfile2.open ("cool.txt");
	
	for(unsigned i = 0; i < zips.size(); i++)
	{
		myfile2 << zips[i].zip << " = " << zips[i].count << endl;
	}
	
	myfile2.close();
	return 0;
}

#endif
