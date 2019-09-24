# api-simple-php

## INTRODUCTION

THIS IS A SIMPLE REST API FOR MY ART GALLERY WRITTEN IN 

BASIC PHP AND MYSQL.

I HAVE ONLY IMPLEMENTED `READ` ATTRIBUTE AND `SEARCH` AS I WILL BE USING ONLY THESE CALLS ONLY.
YOU CAN ADD `POST`, `UPDATE`, `DELETE` FROM THIS TUTORIAL BELOW.
https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html

## CONTENTS

localhost.sql.zip           CONTAINS THE SQL FOR THE DATABASE, TABLE AND VALUES

/SHARED                     SHARED FUNCTIONS
/OBJECTS                    OBJECTS I.E. TABLES WE WILL BE WORKING ON
/CONFIG                     CONFIGURATION OF DATABASE AND APPLICATION

/ARTDATA                    OBJECT CREATED; BECAUSE OF TABLE ARTDATA, 
                            ALL FUNCTIONS OF ARTDATA TABLE ARE KEPT HERE


## USAGE
artdata/read.php            DISPLAYS ALL DATA FROM TABLE ARTDATA
artdata/search.php?s=oil    SEARCHES ALL COLUMNS OF TABLE ARTDATA FOR 'OIL'
artdata/read_paging.php     DISPLAYS ALL DATA FROM TABLE ARTDATA IN PAGES
                            NO OF ROWS IN A PAGE CAN BE SET IN config/core.php
                            // set number of records per page
                            $records_per_page = 5;

                            RANGE OF LINKS IN A PAGE CAN BE SET IN config/core.php
                            // range of links to show
                            $range = 2;

-- IF WE WANT TO GENERATE MORE OBJECTS LIKE `TYPE` WE CAN CREATE NEW OBJECTS AND CONTINUE

## DATABASE STRUCTURE

CAN BE DEFINED IN config/database.php

DATABASE                    MERCURIAL
TABLE                       ARTDATA - THIS IS A COMBINED TABLE OF ALL THE ATTRIBUTES
                            (
                                ALTERNATIVELY WE HAVE TO USE FOLLOWING DIFFERENT TABLES AND RELATIONS
                                ART, FORM, LOCATION, SCHOOL, TIMEFRAME, TYPE
                            )   
Database SQL file can be found in ARTDATA.sql.tar.bz2                            
