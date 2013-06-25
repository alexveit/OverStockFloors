#include <iostream>
#include <fstream>
#include <string>
#include <sstream>
#include <vector>
#include <algorithm>
using namespace std;

struct Place
{
	string address;
	float dist;
	Place() : address(""), dist(0) {}
	Place(string a, float d) : address(a), dist(d) {}
	
	Place& operator= (const Place& p)
	{
		address = p.address;
		dist = p.dist;
		return *this;
	}

};

bool comparestuff (const Place& a1,const Place& a2)
{
	return (a1.dist<a2.dist);
}

Place get_place(string line)
{
	Place p;
	string address;
	string dist;
	istringstream iss(line);
	getline(iss,address,':');
	getline(iss,dist, ' ');
	p.address = address;
	p.dist = atof (dist.c_str());
	return p;
}

int main(int, char*[])
{
	string line;
	string place;
	ifstream myfile ("30041dists.txt");
	vector<Place> places;
	if (myfile.is_open())
	{
		while ( myfile.good() )
		{
			getline (myfile,line);
			places.push_back(get_place(line));
		}
		myfile.close();
	}
	
	
	sort(places.begin(), places.end(), comparestuff);
	
	ofstream myfile2;
	myfile2.open ("cool.txt");
	
	for(unsigned i = 0; i < places.size(); i++)
	{
		myfile2 << places[i].address << " ----- " << places[i].dist << endl;
	}
	
	myfile2.close();
	return 0;
}

