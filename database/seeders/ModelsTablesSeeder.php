<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModelsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'User', 'friendly' => 'Manage Users'],
            ['id' => 2, 'name' => 'Role', 'friendly' => 'Manage Roles'],  
            ['id' => 3, 'name' => 'Client', 'friendly' => 'Manage Clients'],
            ['id' => 4, 'name' => 'Ticket', 'friendly' => 'Manage Tickets'], 
            ['id' => 5, 'name' => 'Contact', 'friendly' => 'Manage Contacts'], 
            ['id' => 6, 'name' => 'Note', 'friendly' => 'Manage Notes'], 
            ['id' => 7, 'name' => 'Category', 'friendly' => 'Manage Categories'],
            ['id' => 8, 'name' => 'Faq', 'friendly' => 'Manage Faqs'],   
            ['id' => 9, 'name' => 'SubCategory', 'friendly' => 'Manage Sub Categories'], 
            ['id' => 10, 'name' => 'Nature', 'friendly' => 'Manage Natures'], 
            ['id' => 11, 'name' => 'Department', 'friendly' => 'Manage Departments'],
            ['id' => 12, 'name' => 'Item', 'friendly' => 'Manage Item'],  
            ['id' => 13, 'name' => 'ItemCategory', 'friendly' => 'Manage Item Category'],
            ['id' => 14, 'name' => 'ItemSubCategory', 'friendly' => 'Manage Item Sub Categories'], 
            ['id' => 15, 'name' => 'Incident', 'friendly' => 'Manage Incidents'], 
            ['id' => 16, 'name' => 'Country', 'friendly' => 'Manage Countries'], 
            ['id' => 17, 'name' => 'Education', 'friendly' => 'Manage Educations'],
            ['id' => 18, 'name' => 'EmploymentStatus', 'friendly' => 'Manage Employment Statuses'],   
            ['id' => 19, 'name' => 'JobTitle', 'friendly' => 'Manage Job Titles'], 
            ['id' => 20, 'name' => 'WorkShift', 'friendly' => 'Manage Work Shifts'], 
            ['id' => 21, 'name' => 'Contract', 'friendly' => 'Manage Contracts'],
            ['id' => 22, 'name' => 'TerminationReason', 'friendly' => 'Manage Termination Reasons'],  
            ['id' => 23, 'name' => 'Employee', 'friendly' => 'Manage Employees'],
            ['id' => 24, 'name' => 'Course', 'friendly' => 'Manage Courses'],  
            ['id' => 25, 'name' => 'EmploymentHistory', 'friendly' => 'Manage Employment Histories'],
            ['id' => 26, 'name' => 'EducationHistory', 'friendly' => 'Manage Education Histories'],
            ['id' => 27, 'name' => 'Progression', 'friendly' => 'Manage Progression'], 
            ['id' => 28, 'name' => 'BenefitType', 'friendly' => 'Manage Benefit Types'], 
            ['id' => 29, 'name' => 'Benefit', 'friendly' => 'Manage Benefits'],
            ['id' => 30, 'name' => 'Emergency', 'friendly' => 'Manage Emergency'], 
            ['id' => 31, 'name' => 'Dependent', 'friendly' => 'Manage Dependents'], 
            ['id' => 32, 'name' => 'Bankdetail', 'friendly' => 'Manage Bank Details'],
            ['id' => 33, 'name' => 'Document', 'friendly' => 'Manage Documents'],
            ['id' => 34, 'name' => 'Parking', 'friendly' => 'Manage Parkings'],
            ['id' => 35, 'name' => 'Pension', 'friendly' => 'Manage Pensions'],
            ['id' => 36, 'name' => 'MedicalClass', 'friendly' => 'Manage Medical Classes'],
            ['id' => 37, 'name' => 'Medical', 'friendly' => 'Manage Medicals'],
            ['id' => 38, 'name' => 'Relation', 'friendly' => 'Manage Relations'],
            ['id' => 39, 'name' => 'Deduction', 'friendly' => 'Manage Deductions'],
            ['id' => 40, 'name' => 'Employeededuction', 'friendly' => 'Manage Employee deductions'],
            ['id' => 41, 'name' => 'Report', 'friendly' => 'Manage Reports'],
            ['id' => 42, 'name' => 'Team', 'friendly' => 'Manage Teams'],
            ['id' => 43, 'name' => 'Leavetype', 'friendly' => 'Manage Leave Type'],
            ['id' => 44, 'name' => 'Leavestatus', 'friendly' => 'Manage Leave Statuses'],
            ['id' => 45, 'name' => 'Leaveentitlement', 'friendly' => 'Manage Leave Entitlements'],
            ['id' => 46, 'name' => 'Leaverequest', 'friendly' => 'Manage Leave Request'], 
            ['id' => 47, 'name' => 'Training', 'friendly' => 'Manage Training'], 
            ['id' => 48, 'name' => 'Vacancy', 'friendly' => 'Manage vacancies'],         
            ['id' => 49, 'name' => 'Payroll', 'friendly' => 'Manage Payroll'],           
            ['id' => 50, 'name' => 'Invoicing', 'friendly' => 'Access Invoicing'],
            ['id' => 51, 'name' => 'Rates', 'friendly' => 'Manage Invoicing rates'],


        ];

        foreach ($items as $item) {
            
            \App\Models\Mo::updateOrCreate(['id'=>$item['id']],$item);
        }
    }
}
