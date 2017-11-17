有一个class叫做 BuildMonster
其中有个class 叫做 Monster
但是这个monster的constrctor特别费时间
然后这个BuilderMonster里面的private variable是一个map
map的key 是 int， value 就是Monster
在BuilderMonster 里有个方程就是 checkmap(int input)，而且是多线程的
在进入map之前先lock 进入map之后就看有没有 int input 的值 如果有就继续，
如果没有就建造一个monster 之后 unlock
问题是， 怎么让这个function更快 因为Monster 构建太费时间了
