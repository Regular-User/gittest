// max_duplicates_sequence.cpp
// Определить длину максимальной подпоследовательности, состоящей из идущих подряд равных элементов.
// Пример: { 1, 2, 3, 3, 0, 0, 0, 1, 2 } -> 3 (три нуля подряд).
#include <cstddef>
#include <iostream>
#include <sstream> // строковые потоки для тестирования п.4
using namespace std;

// Вычислить максимум двух целых чисел.
inline size_t max(size_t a, size_t b)
{return a<b? b: a;}

// П.1: обработка произвольного массива, переданного как адрес + размер
size_t max_duprun(const double a[], size_t n){
  if (n==0) return 0;

// По крайней мере, один элемент в массиве есть.
size_t max_run = 1; // максимальная длина на данный момент
size_t cur_run = 1; // текущая длина
for (size_t i=1; i<n; ++i)
{
if (a[i]!=a[i-1]) // соседние элементы не равны
cur_run=1;
else // продолжается подпоследовательность равных
++cur_run;
max_run=max(max_run, cur_run);
}
return max_run;
}


// П.2: тестирование функции из п.1 на заданном массиве с заданным результатом.
bool test_max_duprun_array(const double a[], size_t n, size_t result){
return result==max_duprun(a, n);
}


// П.3: считывание чисел с потока ввода.
size_t max_duprun(istream &in)
{
  size_t max_run = 0; // максимальная длина на данный момент
  double x, prev_x; // последнее и предпоследнее прочитанные числа
  if (in>>prev_x){
// Последовательность содержит не менее одного элемента.
size_t cur_run = 1; // текущая длина
max_run = 1; // по крайней мере, есть один элемент

while (in >> x)
{
if (x != prev_x) // соседние элементы не равны
{
  cur_run= 1;
  prev_x= x;
}
else // продолжается подпоследовательность равных
++cur_run;
max_run = max(max_run, cur_run);
}
}
return max_run;
}


// П.4: тестирование функции из п.3 на заданном массиве с заданным результатом.
bool test_max_duprun_stream(const double a[], size_t n, size_t result)
{
  stringstream test;
  for (size_t i=0; i<n; ++i)
  test << a[i] << ' ';
  return result == max_duprun(test);
}