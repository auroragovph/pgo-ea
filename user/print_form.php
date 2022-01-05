
 

                           
                          
                            


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Educational Assistance Form</title>
    <link rel="stylesheet" href="tailwind/tailwind.min.css">
    <link rel="stylesheet" href="paper/paper.css">
    <style>

        *{
            font-family: 'Century Gothic', sans-serif;
        }

        @page { size: A4; }
    </style>
</head>

    <?php

    include('includes/dbconnection.php');
               $cid=$_GET['view'];
                 $ret=mysqli_query($con,"select * from  tblappointment where ID='$cid'");
                    $cnt=1;
                 while ($row=mysqli_fetch_array($ret)) {

                   ?> 
<body class="A4">

    <section class="sheet padding-10mm">

        <!-- HEADER -->
        <div class="-mt-5 flex">
            <div class="w-2/12 flex">
                <img class="h-28 m-auto" src="../image/logo-md.png" alt="" srcset="">
            </div>
            <div class="text-center w-7/12 flex">
                <div class="m-auto">
                    <p class="text-xs block">Republic of the Philippines</p>
                    <p class="font-bold block">Provincial Goverment of Aurora</p>
                    <p class="text-xs">Baler</p>
                    <p class="font-bold block text-2xl mt-3 uppercase">Educational Assistance</p>
                    <p class="block">Application Form</p>
                    <p class="block">S.Y. __________________</p>
                </div>
            </div>
            <div class="w-3/12 flex">
                <div class="border border-gray-900 w-44 h-44 m-auto flex">
                    <img src="../admin/uploads/<?php echo $row['file']; ?>" alt="" srcset="">
                </div>
            </div>
        </div>

        <!-- CONTENT -->

        <!-- NAME -->
        <div class="mt-10">
            <div class="flex w-full">
                <div class="w-3/12"><p class="font-bold uppercase">Name of Applicant</p></div>
                <div class="w-9/12 border-b-2 border-gray-900">
                    <p class="inline uppercase"><?php  echo $lname=$row['lname'];?></p>
                    <p class="inline uppercase ml-20"><?php  echo $fname=$row['fname'];?></p>
                    <p class="inline uppercase ml-32"><?php  echo $mname=$row['mname'];?></p>
                </div>
            </div>
            <div class="flex w-full">
                <div class="w-3/12"></div>
                <div class="w-9/12">
                    <p class="italic text-sm inline">Last Name</p>
                    <p class="italic text-sm inline ml-20">First Name</p>
                    <p class="italic text-sm inline ml-32">Middle Initial</p>
                </div>
            </div>
        </div>

        <!-- AGE & SEX -->
        <div class="mt-3">
            <div class="flex w-full">

                <div class="w-3/12"><p class="font-bold uppercase">AGE</p></div>
                <div class="w-4/12 border-b-2 border-gray-900"><?php  echo $age=$row['age'];?> y/o </div>

                <div class="w-1/12"><p class="font-bold uppercase text-right">SEX</p></div>
                <div class="w-4/12 border-b-2 border-gray-900 text-center"> <?php  echo $sex=$row['sex'];?> </div>
            </div>
        </div>

        <!-- Address -->
        <div class="mt-3">
            <div class="flex w-full">
                <div class="w-4/12"><p class="font-bold uppercase">Present Address</p></div>
                <div class="w-8/12 border-b-2 border-gray-900">
                    <p class="inline"><?php  echo $address=$row['p_address'];?></p>
                </div>
            </div>
            <div class="flex w-full">
                <div class="w-4/12"><p class="font-bold uppercase">Permanent Address</p></div>
                <div class="w-8/12 border-b-2 border-gray-900">
                    <p class="inline"><?php  echo $address=$row['per_address'];?></p>
                </div>
            </div>
        </div>

        <!-- CONTACT & EMAIL -->
        <div class="mt-3">
            <div class="flex w-full">
                <div class="w-3/12"><p class="font-bold uppercase">CONTACT NUMBER</p></div>
                <div class="w-3/12 border-b-2 border-gray-900"> <?php  echo $PhoneNumber=$row['PhoneNumber'];?> </div>
                <div class="w-2/12"><p class="font-bold uppercase text-right text-sm">EMAIL ADDRESS</p></div>
                <div class="w-4/12 border-b-2 border-gray-900 text-center text-sm"> <?php  echo $Email=$row['Email'];?></div>
            </div>
        </div>

        <!-- BIRTH DAY & PLACE -->
        <div class="mt-3">
            <div class="flex w-full">
                <div class="w-3/12"><p class="font-bold uppercase">Birth Date</p></div>
                <div class="w-3/12 border-b-2 border-gray-900"> <?php  echo $birthdate=$row['birthdate'];?></div>
                <div class="w-2/12"><p class="font-bold uppercase text-right text-sm">Birth Place</p></div>
                <div class="w-4/12 border-b-2 border-gray-900 text-center text-sm"> <?php  echo $birthplace=$row['birthplace'];?> </div>
            </div>
        </div>

        <!-- School name and address -->
        <div class="mt-3">
            <div class="flex w-full">
                <div class="w-3/12"><p class="font-bold uppercase">Name of School</p></div>
                <div class="w-8/12 border-b-2 border-gray-900">
                    <p class="inline">A<?php  echo $school=$row['school_name'];?></p>
                </div>
            </div>
            <div class="flex w-full">
                <div class="w-3/12"><p class="font-bold uppercase">School Address</p></div>
                <div class="w-9/12 border-b-2 border-gray-900">
                    <p class="inline"><?php  echo $School_address=$row['School_address'];?></p>
                </div>
            </div>
        </div>

         <!-- GWA -->
        <div class="mt-3">
            <div class="flex w-full">
                <div class="w-4/12"><p class="font-bold uppercase">Current Year Level</p></div>
                <div class="w-2/12 border-b-2 border-gray-900"> <?php  echo $current_y_level=$row['current_y_level'];?>r </div>
                <div class="w-4/12"><p class="font-bold uppercase text-right">GWA From Last S.Y./SEM</p></div>
                <div class="w-2/12 border-b-2 border-gray-900 text-center"> <?php  echo $gwa=$row['gwa'];?> </div>
            </div>
        </div>


        <hr class="border-b-2 border-gray-900 my-3">

        <p class="uppercase text-lg font-bold">FAMILY BACKGROUD</p>

        <!-- FATHER AND MOTHER -->
        <div class="mt-3">
            <div class="flex w-full">
                <div class="w-3/12"><p>Father's Name</p></div>
                <div class="w-9/12 border-b-2 border-gray-900">
                    <p class="inline"><?php  echo $father_name=$row['father_name'];?></p>
                </div>
            </div>
            <div class="flex w-full">
                <div class="w-3/12"><p>Occupation</p></div>
                <div class="w-9/12 border-b-2 border-gray-900">
                    <p class="inline"><?php  echo $occupation=$row['occupation'];?></p>
                </div>
            </div>
            <div class="flex w-full">
                <div class="w-3/12"><p>Mother's Name</p></div>
                <div class="w-9/12 border-b-2 border-gray-900">
                    <p class="inline"><?php  echo $mother_name=$row['mother_name'];?></p>
                </div>
            </div>
            <div class="flex w-full">
                <div class="w-3/12"><p>Occupation</p></div>
                <div class="w-9/12 border-b-2 border-gray-900">
                    <p class="inline"><?php  echo $occupation1=$row['occupation1'];?></p>
                </div>
            </div>
        </div>

        <!-- MEMBER & INCOME -->
        <div class="mt-3">
            <div class="flex w-full">

                <div class="w-5/12"><p class="uppercase">Number of Family Members</p></div>
                <div class="w-2/12 border-b-2 border-gray-900"> <?php  echo $number_f_mem=$row['number_f_mem'];?> </div>

                <div class="w-4/12"><p class="uppercase text-right">Monthly Family Income</p></div>
                <div class="w-3/12 border-b-2 border-gray-900 text-center"> <?php  echo $income=$row['income'];?> </div>
            </div>
        </div>

        <!-- SIGNATORIES -->
        <p class="italic text-center mt-2">I/We herby certify that all information stated above are true and accurate.</p>
        <div class="flex w-full">
            <div class="w-1/2 text-center">
                <p class="mt-5">___________________________</p>
                <p class="font-bold">Signature over Printed Name <br> of Applicant</p>
            </div>
            <div class="w-1/2 text-center">
                <p class="mt-5">___________________________</p>
                <p class="font-bold">Signature over Printed Name <br> of Parent/Guardian</p>
            </div>
        </div>

        <hr class="border-b-2 border-gray-900 my-3">

        <p class="uppercase font-bold">Remarks</p>
        <div class="flex w-full">
            <div class="w-1/2">

               <p class="text-sm"> Date of Application <span class="ml-3"><?php  echo $ApplyDate=$row['ApplyDate'];?></span> </p>
               <p class="text-sm"> Date Received <span class="ml-9">_____________________</span> </p>
               <p class="text-sm"> Received By <span class="ml-12">_____________________</span> </p>
                <p class="text-sm"> Tracking No. <span class="ml-12"><?php  echo $AptNumber=$row['AptNumber'];?></span> </p>

            </div>
            <div class="w-1/2">
               <p class="font-bold uppercase -mt-5">Approved by</p>
               <hr class="border-b-1 border-gray-900 mt-10">
               <p class="text-center uppercase font-bold">GERARDO A. NOVERAS</p>
               <p class="text-center text-sm">Governor</p>
            </div>
        </div>





    </section>


       <?php } ?>

</body>
</html>