#include <iostream>
#include <boost/program_options.hpp>

using namespace std;
using namespace boost::program_options;

int main(int argc, char* argv[]) 
{
    options_description desc("Usage");
    desc.add_options()
        ("initialize,i", "creates user \'server\' and initialize")
        ("backup,b", "backs up library database")
        ("restore,r", "restores library database")
        ("help,h", "shows help");
    try
    {
        variables_map vm;
        store(parse_command_line(argc, argv, desc), vm);
        notify(vm);

        [[likely]] if (argc == 1 || vm.count("help"))
        {
            throw 0;
        }
        if (vm.count("initialize"))
        {
            cout << R"(

**** INITIALIZE | Rolling Ress Library Backup Tool ****

To continue, you need to copy and paste these command line.
You are going to logged in to root. Please wait...

======================COPY COMMANDS BLOW=========================

mysql > )" "CREATE DATABASE library default character set utf8; "
"CREATE USER 'server'@'localhost' IDENTIFIED BY '20234748'; "
"GRANT ALL PRIVILEGES ON library.* to 'server'@'localhost'; "
"GRANT RELOAD, SUPER, PROCESS ON *.* TO 'server'@'localhost'; "
"GRANT CREATE, INSERT, DROP, UPDATE ON mysql.backup_progress TO 'server'@'localhost'; "
"GRANT CREATE, INSERT, SELECT, DROP, UPDATE, ALTER ON mysql.backup_history TO 'server'@'localhost'; "
"GRANT REPLICATION CLIENT ON *.* TO 'server'@'localhost'; "
"GRANT SELECT ON performance_schema.replication_group_members TO 'server'@'localhost'; "
"exit; "<< endl <<
R"(
============AND PASTE THEM AFTER ENTERING PASSWORD===================

Now you are logging into mysql root account. )";
            system("mysql -u root -p");
            return 0;
        }
        if (vm.count("backup"))
        {
            cout << R"(

**** BACKUP | Rolling Ress Library Backup Tool ****

Backing up library database. Make sure you've run initialize command.
Password is the student number. )";
            system("mysqldump -u server -p library > library_db.sql");
            return 0;
        }
        if (vm.count("restore"))
        {
            cout << R"(

**** RESTORE | Rolling Ress Library Backup Tool ****

Restoring library database. Make sure you've run initialize command.
Password is the student number. )";
            system("mysql -u server -p library < library_db.sql");
            return 0;
        }
    }
    catch (...)
    {
        cout << R"(

**** Rolling Ress Library Backup Tool ****

If you are using this tool for the first time, run this tool with initialize option.
use backup option to backup, restore option to restore the database.)" << endl;
        cout << desc;
        return 0;
    }
}