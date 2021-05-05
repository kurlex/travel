#include <bits/stdc++.h>
#define mp make_pair
#define pb push_back
#define Max  3162279
#define ll long long
#define ld long double
#define OO 1000000000000000000
#define ft first
#define sd second
#define vec(i) vector<i>
#define pi pair<int,int>

const long long MOD = (1e9) + 7;
const double EPS = (1e-7);//use it if you tried to convert float to int
int dcmp(double x, double y) {	return fabs(x-y) <= EPS ? 0 : x < y ? -1 : 1;	}
inline void fast(){std::ios_base::sync_with_stdio(0);std::cin.tie(NULL); std::cout.tie(NULL); std::cerr.tie(NULL);}
using namespace std;

int toInt(string s){
int ans = 0,coe = 1;
for(int i=s.size()-1;i>=0;i--,coe*=10)
    ans+= (s[i]-'0')*coe;
return ans;
}
struct airport{

string name,code;
int countryID;
airport(){
this->name = this->code = "";
this->countryID = 0;
}
airport(string name,string code,int countryID){
this->name = name;
this->code = code;
this->countryID = countryID;
}

};

struct airline{

string name,code;
int countryID;
airline(){
this->name = this->code = "";
this->countryID = 0;
}
airline(string name,string code,int countryID){
this->name = name;
this->code = code;
this->countryID = countryID;
}

};
struct country{

string name,code;

country(string name,string code){
this->name = name;
this->code = code;
}
country(){
this->name = this->code = "";}
};

country countries[5000];
airport airports[5000];
airline airlines[5000];

bool verif(int fromAirport){

            for(int j=1;j<600;j++)
                if(airlines[j].countryID==airports[fromAirport].countryID)
                   return true;
            return false;

}

string s,s1,s2,s3,cs;
int countryID,airportID,airlineID;
const int T = 60*60*24;
int flightID = 0;
int main(){
    string inter = "0";
     while(getline(cin,s)){
        if(s[0]=='-')
            break;
        s1 = s2 =s3 = cs = "";
        s = s.substr(1,s.size()-4);
        int i = 0;
        while(s[i]!=','){
            inter[0] = s[i++];
            cs+=inter;
        }
        i+=2;

        while(s[i]!='\''){
            inter[0] = s[i++];
            s1+=inter;
        }
        i+=3;
        s2 = s.substr(i);
        countryID = toInt(cs);
        countries[countryID] = country(s1,s2);
    }

     while(getline(cin,s)){
        if(s[0]=='-')
            break;
        s1 = s2 =s3 = cs = "";
        s = s.substr(1,s.size()-3);
        int i = 0;
        while(s[i]!=','){
            inter[0] = s[i++];
            cs+=inter;
        }
        i+=2;

        while(s[i]!='\''){
            inter[0] = s[i++];
            s1+=inter;
        }
        i+=3;

        while(s[i]!='\''){
            inter[0] = s[i++];
            s2+=inter;
        }
        i+=2;
        s3 = s.substr(i);
        countryID = toInt(s3);
        airlineID = toInt(cs);
        airlines[airlineID] = airline(s1,s2,countryID);
    }

    while(getline(cin,s)){
        s1 = s2 =s3 = cs = "";
        s = s.substr(1,s.size()-3);
        int i = 0;
        while(s[i]!=','){
            inter[0] = s[i++];
            cs+=inter;
        }
        i+=2;

        while(s[i]!='\''){
            inter[0] = s[i++];
            s1+=inter;
        }
        i+=3;

        while(s[i]!='\''){
            inter[0] = s[i++];
            s2+=inter;
        }
        i+=2;
        s3 = s.substr(i);
        countryID = toInt(s3);
        airportID = toInt(cs);
        airports[airportID] =airport(s1,s2,countryID);
    }


    for(int fromAirport=1;fromAirport<1005;fromAirport++)
        if(airports[fromAirport].countryID!=0){

            if(!verif(fromAirport)){
                cerr<<fromAirport<<'\n';
                continue;
            }

            time_t rawtime;
            struct tm * timeinfo;

            vector<int> availableAirlines;
            for(int j=1;j<600;j++)
                if(airlines[j].countryID==airports[fromAirport].countryID)
                   availableAirlines.pb(j);
            if(availableAirlines.size()==0)
                continue;
            rawtime += T*15;
            time(&rawtime);
            for(int j=0;j<92;j++,rawtime += T){
                for(int k=0;k<4;k++){

                    timeinfo = localtime(&rawtime);
                    int selectedAirline = availableAirlines[rand() % availableAirlines.size()];
                    int toAirport;
                    do{
                        toAirport = rand()%1000 + 1;
                    }while(toAirport==fromAirport || airports[toAirport].countryID==0);
                    if(toAirport>950)
                        cerr<<airports[toAirport].code<<' '<<airports[toAirport].countryID<<' '<<airports[toAirport].name<<'\n';


                    int cost = abs(toAirport - fromAirport) + rand()%500 + 50;
                    int hour = rand()%24;
                    int minute = rand()%60;
                    string Time =  (hour < 10 ? "0"+to_string(hour): to_string(hour)) + ":" + (minute < 10 ? "0"+to_string(minute): to_string(minute));
                    flightID++;
                    printf( "( %d , %d , %d , %d , \'2021-%s-%s\' , \'%s\' , %d ),\n" , flightID, fromAirport , toAirport , selectedAirline ,  (timeinfo->tm_mon + 1 < 10 ? "0"+to_string(timeinfo->tm_mon + 1) : to_string(timeinfo->tm_mon+1)).c_str() , (timeinfo->tm_mday< 10 ? "0"+to_string(timeinfo->tm_mday) : to_string(timeinfo->tm_mday)).c_str() , Time.c_str() , cost);
                    //insert into flight (flightID,fromAirport,toAirport,airline,date,time,cost) values
                    time_t returntime = rawtime + T*(rand()%4 + 1);
                    timeinfo = localtime(&returntime);
                    flightID++;
                    hour = rand()%24;
                    minute = rand()%60;
                    Time =  (hour < 10 ? "0"+to_string(hour): to_string(hour)) + ":" + (minute < 10 ? "0"+to_string(minute): to_string(minute));
                    printf( "( %d , %d , %d , %d , \'2021-%s-%s\' , \'%s\' , %d ),\n" , flightID,  toAirport, fromAirport , selectedAirline  ,  (timeinfo->tm_mon + 1 < 10 ? "0"+to_string(timeinfo->tm_mon + 1) : to_string(timeinfo->tm_mon+1)).c_str() , (timeinfo->tm_mday< 10 ? "0"+to_string(timeinfo->tm_mday) : to_string(timeinfo->tm_mday)).c_str() , Time.c_str() , cost);
                }
            }


    }
    cerr<<flightID<<"----";
}
