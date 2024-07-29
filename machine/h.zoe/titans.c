#include <stdio.h>
#include <unistd.h>

int main()
{
    setuid(0);
    setgid(0);
    printf("SC :: Titans database\n");
    
    char *titans[3] = {"eren", "armored", "colossal"};
    
    for (int i = 0; i < 3; i++) {
        printf("retreiving information of %s ... \n", titans[i]);
        char buffer[100];
        snprintf(buffer, sizeof(buffer), "titan %s\n", titans[i]);
        system(buffer);
    }

    return 0;
}
