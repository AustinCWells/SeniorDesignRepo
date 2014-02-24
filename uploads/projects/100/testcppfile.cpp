#include <iostream>
using namespace std;
int main() {
	unsigned int values[5] = {2, 4, 6, 8, 10};
	unsigned int *vPtr = &values[0];
	for(int i = 0; i<5; i++) cout << vPtr[i] << endl;

   int n = 5;
   int *pn = &n;
   int **ppn = &pn;

   cout  << "Value of n:\n"
         << "direct value: " << n << endl
         << "indirect value: " << *pn << endl
         << "doubly indirect value: " << **ppn << endl
         << "address of n: " << pn << endl
         << "address of n via indirection: " << *ppn << endl
         << "address of the pointer to n: " << ppn << endl;
}
