using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using PASSIS.DAO;
using PASSIS.DAO.Utility;
using System.IO;
using PASSIS.LIB;
using System.Data.SqlClient;

public partial class UploadScoresBulk : PASSIS.LIB.Utility.BasePage
{
    PASSISLIBDataContext context = new PASSISLIBDataContext();
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!IsPostBack)
        {
            if (!isUserClassTeacher)
            {
                PASSIS.LIB.Grade grd = getLogonTeacherGrade;
                //if (grd != null)
                //{
                //}
                int SessionId = 0;
                clsMyDB mdb = new clsMyDB();
                mdb.connct();
               
                ddlSession.DataSource = new UploadScoresBulk().schSession().Distinct();
                ddlSession.DataTextField = "SessionName";
                ddlSession.DataValueField = "ID";
                ddlSession.DataBind();
                ddlSession.Items.Insert(0, new System.Web.UI.WebControls.ListItem("--Select Session--", "0", true));

                long curriculumId = Convert.ToInt32(new PASSIS.LIB.SchoolLIB().GetSchoolCurriculumId(logonUser.SchoolId));
                long schoolTypeId = Convert.ToInt32(new PASSIS.LIB.SchoolLIB().GetSchoolTypeId(logonUser.SchoolId));
                ddlYear.DataSource = new PASSIS.LIB.SchoolLIB().getAllClass_Grade(curriculumId, schoolTypeId);
                ddlYear.DataBind();


                var getTestTemplate = from t in context.TestAssigenmentBroadSheetTemplates
                                      where t.TeacherId == logonUser.Id
                                      select new
                                      {
                                          t.BroadSheetDescriptionCode.DescriptionName
                                      };
                ddlDescription.DataSource = getTestTemplate;
                ddlDescription.DataTextField = "DescriptionName";
                ddlDescription.DataBind();
                ddlDescription.Items.Insert(0, new ListItem("--Select--", "0", true));

                ddlTerm.DataSource = new AcademicTermLIB().RetrieveAcademicTerm();
                ddlTerm.DataBind();
                ddlTerm.Items.Insert(0, new ListItem("--Select--", "0", true));
            }
            else
            {
                int SessionId = 0;
                clsMyDB mdb = new clsMyDB();
                mdb.connct();
                //string query = "SELECT DISTINCT AcademicSessionId FROM AcademicSession WHERE SchoolId=" + logonUser.SchoolId;
                //SqlDataReader reader = mdb.fetch(query);
                //while (reader.Read())
                //{
                //    ddlSession.DataSource = from s in context.AcademicSessionNames
                //                            where s.ID == Convert.ToInt64(reader["AcademicSessionId"].ToString())
                //                            select s;
                //    ddlSession.DataBind();
                //    ddlSession.Items.Insert(0, new ListItem("--Select--", "0", true));
                //}
                //reader.Close();
                //mdb.closeConnct();

                ddlSession.DataSource = new UploadScoresBulk().schSession().Distinct();
                ddlSession.DataTextField = "SessionName";
                ddlSession.DataValueField = "ID";
                ddlSession.DataBind();
                ddlSession.Items.Insert(0, new System.Web.UI.WebControls.ListItem("--Select Session--", "0", true));

                long curriculumId = Convert.ToInt32(new PASSIS.LIB.SchoolLIB().GetSchoolCurriculumId(logonUser.SchoolId));
                long schoolTypeId = Convert.ToInt32(new PASSIS.LIB.SchoolLIB().GetSchoolTypeId(logonUser.SchoolId));
                ddlYear.DataSource = new PASSIS.LIB.SchoolLIB().getAllClass_Grade(curriculumId, schoolTypeId);
                ddlYear.DataBind();


                var getTestTemplate = from t in context.TestAssigenmentBroadSheetTemplates
                                      where t.TeacherId == logonUser.Id
                                      select new
                                      {
                                          t.BroadSheetDescriptionCode.DescriptionName
                                      };
                ddlDescription.DataSource = getTestTemplate;
                ddlDescription.DataTextField = "DescriptionName";
                ddlDescription.DataBind();
                ddlDescription.Items.Insert(0, new ListItem("--Select--", "0", true));

                ddlTerm.DataSource = new AcademicTermLIB().RetrieveAcademicTerm();
                ddlTerm.DataBind();
                ddlTerm.Items.Insert(0, new ListItem("--Select--", "0", true));


                ////send a message that the logon user will not be able to view certain section of this page bcos he's not a class teacher 
            }
        }
    }
    public IList<AcademicSessionName> schSession()
    {
        PASSISLIBDataContext context = new PASSISLIBDataContext();
        var session = from c in context.AcademicSessions
                      where c.SchoolId == logonUser.SchoolId && c.IsCurrent == true
                      orderby c.IsCurrent descending
                      select c.AcademicSessionName;
        return session.ToList<AcademicSessionName>();
    }
    protected void ddlYear_SelectedIndexChanged(object sender, EventArgs e)
    {
        long yearId = Convert.ToInt64(ddlYear.SelectedValue);
        long sessionId = Convert.ToInt64(ddlSession.SelectedValue);
        long termId = Convert.ToInt64(ddlTerm.SelectedValue);
        ddlGrade.Items.Clear();
        var availableGrades = new ClassGradeLIB().getAllGradesByYear((long)logonUser.SchoolId, logonUser.SchoolCampusId, yearId);
        ddlGrade.DataSource = availableGrades;
        ddlGrade.DataBind();
        ddlGrade.Items.Insert(0, new ListItem("--Select--", "0", true));

        //Populate Category
        ddlCategory.Items.Clear();
        var categoryList = from s in context.ScoreCategoryConfigurations where s.ClassId == yearId && s.SessionId == sessionId && s.TermId == termId && s.SchoolId == logonUser.SchoolId && s.CampusId == logonUser.SchoolCampusId select s;
        ddlCategory.DataSource = categoryList;
        ddlCategory.DataBind();
        ddlCategory.Items.Insert(0, new ListItem("--Select--", "0", true));
    }
    protected void ddlGrade_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void btnUploadScore_Click(object sender, EventArgs e)
    {
        //try
        //{
            //check if all the required fields on the form has been selected
            Int64 yearId = Convert.ToInt64(ddlYear.SelectedValue);
        Int64 gradeId = Convert.ToInt64(ddlGrade.SelectedValue);
        Int64 UploadedById = logonUser.Id;
        //Int64 departmentId = 0;
        Int64 sessionId = Convert.ToInt64(ddlSession.SelectedValue);
        Int64 termId = Convert.ToInt64(ddlTerm.SelectedValue);
        if (ddlYear.SelectedIndex == 0)
        {
            lblErrorMsg.Text = "Kindly select year";
            lblErrorMsg.ForeColor = System.Drawing.Color.Red;
            lblErrorMsg.Visible = true;
            return;
        }
        if (ddlGrade.SelectedIndex == 0)
        {
            lblErrorMsg.Text = "Kindly select class";
            lblErrorMsg.ForeColor = System.Drawing.Color.Red;
            lblErrorMsg.Visible = true;
            return;
        }

        if (ddlCategory.SelectedIndex == 0) 
        {
            lblErrorMsg.Text = "Kindly select category";
            lblErrorMsg.ForeColor = System.Drawing.Color.Red;
            lblErrorMsg.Visible = true;
            return;
        }
        if (ddlSubCategory.SelectedIndex == 0)
        {
            lblErrorMsg.Text = "Kindly select sub category";
            lblErrorMsg.ForeColor = System.Drawing.Color.Red;
            lblErrorMsg.Visible = true;
            return;
        }
        if (ddlSession.SelectedIndex == 0)
        {
            lblErrorMsg.Text = "Kindly select session";
            lblErrorMsg.ForeColor = System.Drawing.Color.Red;
            lblErrorMsg.Visible = true;
            return;
        }
        if (txtTotalMark.Text.Trim() == "")
        {
            lblErrorMsg.Text = "Mark Obtainable is Missing";
            lblErrorMsg.ForeColor = System.Drawing.Color.Red;
            lblErrorMsg.Visible = true;
            return;
        }
        if (ddlTerm.SelectedIndex == 0)
        {
            lblErrorMsg.Text = "Kindly select term";
            lblErrorMsg.ForeColor = System.Drawing.Color.Red;
            lblErrorMsg.Visible = true;
            return;
        }
        if (ddlDescription.SelectedIndex == -1)
        {
            lblErrorMsg.Text = "Description Template  is required";
            lblErrorMsg.ForeColor = System.Drawing.Color.Red;
            lblErrorMsg.Visible = true;
            return;
        }
        ScoreCategoryConfiguration scoreCategory = context.ScoreCategoryConfigurations.FirstOrDefault(x => x.ClassId == Convert.ToInt64(ddlYear.SelectedValue) && x.Category == ddlCategory.SelectedItem.Text && x.SessionId == sessionId && x.TermId == termId && x.SchoolId == logonUser.SchoolId && x.CampusId == logonUser.SchoolCampusId);
        if (scoreCategory == null)
        {
            lblErrorMsg.Text = "Kindly set the score category";
            lblErrorMsg.ForeColor = System.Drawing.Color.Red;
            lblErrorMsg.Visible = true;
            return;
        }
        PASSISLIBDataContext db = new PASSISLIBDataContext();

        if (ddlCategory.SelectedItem.Text == "Exam")
        {
            ScoreSubCategoryConfiguration subCategory = context.ScoreSubCategoryConfigurations.FirstOrDefault(x => x.Id == Convert.ToInt64(ddlSubCategory.SelectedValue));
            if (subCategory == null)
            {
                lblErrorMsg.Text = "Kindly set the score sub category";
                lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                lblErrorMsg.Visible = true;
                return;
            }
            if (txtCode.Text == "")
            {
                lblErrorMsg.Text = "Kindly enter the code";
                lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                lblErrorMsg.Visible = true;
                return;
            }




            string TemplateCode = ddlDescription.SelectedItem.Text.ToString();

            //confirm if file to be uploaded has been selected else notify the user to select file to upload
            if (documentUpload.HasFile)
            {

                string originalFileName = Path.GetFileName(documentUpload.PostedFile.FileName);
                string fileExtension = Path.GetExtension(documentUpload.PostedFile.FileName);

                //This is use to confirm if user is uploading against the previously generated template
                TestAssigenmentBroadSheetTemplate broadsheettemplate = db.TestAssigenmentBroadSheetTemplates.FirstOrDefault(x => x.BroadSheetDescriptionCode.DescriptionName == TemplateCode);

                //If template exist
                if (broadsheettemplate != null)
                {
                    //Confirm if the result has been uploaded
                    if (broadsheettemplate.HasSubmitted == false)
                    {
                        string[] subjectId = broadsheettemplate.SubjectId.Split(',');


                        string fileLocation = Server.MapPath("~/docs/ScoreSheets/") + originalFileName;
                        documentUpload.SaveAs(fileLocation);
                        IList<PASSIS.LIB.StudentScore> scoresFound = new List<PASSIS.LIB.StudentScore>();
                        Net.SourceForge.Koogra.Excel.Workbook wkbk = new Net.SourceForge.Koogra.Excel.Workbook(fileLocation);
                        Net.SourceForge.Koogra.Excel.Worksheet workSheet = wkbk.Sheets[0];

                        // long count = 0;
                        for (uint rowCount = workSheet.Rows.MinRow; rowCount <= workSheet.Rows.MaxRow; ++rowCount)
                        {
                            //try
                            //{


                                if (rowCount != workSheet.Rows.MinRow)// jump the first row
                                {

                                    //broadsheettemplate.TotalNumberofSubjectInserted = count;
                                    uint count = 0;
                                    uint newunit = 3;
                                    uint countnum;
                                    foreach (string subId in subjectId)
                                    {
                                        PASSIS.LIB.SubjectTeacher subTeacher = context.SubjectTeachers.FirstOrDefault(x => x.SubjectId == Convert.ToInt64(subId));
                                        PASSIS.LIB.Subject subject = context.Subjects.FirstOrDefault(x => x.Id == Convert.ToInt64(subId));
                                        PASSIS.LIB.SubjectsInSchool subSch = context.SubjectsInSchools.FirstOrDefault(x => x.SubjectId == subject.Id && x.SchoolId == logonUser.SchoolId);
                                        //for (uint count = 0; count <= broadsheettemplate.TotalNumberofSubjectInserted; count++ )
                                        //{
                                        // countnum = count + newunit ;
                                        if (count <= broadsheettemplate.TotalNumberofSubjectInserted)
                                        {
                                            Net.SourceForge.Koogra.Excel.Row row = workSheet.Rows[rowCount];
                                            if (row.Cells[count + 3] != null)
                                            {
                                                PASSIS.LIB.User student = db.Users.FirstOrDefault(x => x.AdmissionNumber == row.Cells[2].Value.ToString().Trim() && x.SchoolId == logonUser.SchoolId && x.SchoolCampusId == logonUser.SchoolCampusId);

                                                StudentScoreTransaction trans = context.StudentScoreTransactions.FirstOrDefault(x => x.BroadSheetTemplateID == broadsheettemplate.ID && x.Code == Convert.ToInt16(txtCode.Text) && x.StudentId == student.Id && x.SubjectId == Convert.ToInt64(subId)
                                                    && x.CategoryId == Convert.ToInt64(ddlCategory.SelectedValue) && x.SubCategoryId == Convert.ToInt64(ddlSubCategory.SelectedValue)
                                                    && x.TermId == termId && x.AcademicSessionID == sessionId && x.ClassId == yearId && x.GradeId == gradeId);
                                                if (Convert.ToInt16(txtCode.Text) < 1)
                                                {
                                                    lblErrorMsg.Text = "Code should not be lesser than 1";
                                                    lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                                                    lblErrorMsg.Visible = true;
                                                    return;
                                                }

                                                if (trans != null)
                                                {
                                                    lblErrorMsg.Text = "Code has been used for this sub category";
                                                    lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                                                    lblErrorMsg.Visible = true;
                                                    continue;
                                                }
                                                else
                                                {
                                                    StudentScoreTransaction transs = context.StudentScoreTransactions.FirstOrDefault(x => x.BroadSheetTemplateID == broadsheettemplate.ID && x.Code == Convert.ToInt16(txtCode.Text) - 1 && x.StudentId == student.Id && x.SubjectId == Convert.ToInt64(subId)
                                                        && x.CategoryId == Convert.ToInt64(ddlCategory.SelectedValue) && x.SubCategoryId == Convert.ToInt64(ddlSubCategory.SelectedValue) && x.TermId == termId && x.AcademicSessionID == sessionId && x.ClassId == yearId && x.GradeId == gradeId);
                                                    if (transs == null && Convert.ToInt16(txtCode.Text) - 1 != 0)
                                                    {
                                                        lblErrorMsg.Text = "Enter lesser number for the code";
                                                        lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                                                        lblErrorMsg.Visible = true;
                                                        return;
                                                    }
                                                }

                                                PASSIS.LIB.StudentScoreTransaction score = new PASSIS.LIB.StudentScoreTransaction();
                                                PASSIS.LIB.StudentScore scores = new PASSIS.LIB.StudentScore();
                                                //Net.SourceForge.Koogra.Excel.Row row = new Net.SourceForge.Koogra.Excel.Row();
                                                //Net.SourceForge.Koogra.Excel.Row row = workSheet.Rows[rowCount];
                                                //do validation when u hv time 
                                                //if (row.Cells[count + 3].Value.ToString() != "")

                                                try
                                                { score.AdmissionNumber = row.Cells[2].Value.ToString(); }
                                                catch { }
                                                score.StudentId = student.Id;
                                                try { score.ExamScore = Convert.ToInt64(row.Cells[count + 3].Value); }
                                                catch { }
                                                score.ExamScoreObtainable = Convert.ToInt16(txtTotalMark.Text);
                                                score.CategoryId = Convert.ToInt64(ddlCategory.SelectedValue);
                                                score.SubCategoryId = Convert.ToInt64(ddlSubCategory.SelectedValue);
                                                score.TermId = termId;
                                                score.AcademicSessionID = sessionId;
                                                score.SubjectId = Convert.ToInt32(subId);
                                                if (subSch.DepartmentId != null)
                                                {
                                                    score.DepartmentId = Convert.ToInt64(subSch.DepartmentId);
                                                }
                                                score.CampusId = logonUser.SchoolCampusId;
                                                score.SchoolId = logonUser.SchoolId;
                                            if (subTeacher != null)
                                            {
                                                score.SubjectTeacherId = Convert.ToInt64(subTeacher.TeacherId);
                                            }
                                            else { score.SubjectTeacherId = logonUser.Id;  }
                                                score.UploadedById = UploadedById;
                                                score.BroadSheetTemplateID = broadsheettemplate.ID;
                                                score.ClassId = Convert.ToInt64(ddlYear.SelectedValue);
                                                score.GradeId = Convert.ToInt64(ddlGrade.SelectedValue);
                                                score.Description = ddlDescription.SelectedItem.Text;
                                                score.Code = Convert.ToInt16(txtCode.Text);
                                                score.Date = DateTime.Now;
                                                score.StatusCode = "I";
                                                score.IsCancelled = false;
                                                context.StudentScoreTransactions.InsertOnSubmit(score);
                                                context.SubmitChanges();

                                                PASSIS.LIB.StudentScore getScoreObj = context.StudentScores.FirstOrDefault(x => x.AdmissionNumber == row.Cells[2].Value.ToString() && x.StudentId == student.Id && x.BroadSheetTemplateID == broadsheettemplate.ID && x.SubjectId == Convert.ToInt64(subId)
                                                    && x.CategoryId == Convert.ToInt64(ddlCategory.SelectedValue) && x.SubCategoryId == Convert.ToInt64(ddlSubCategory.SelectedValue) && x.TermId == termId && x.AcademicSessionID == sessionId && x.ClassId == yearId && x.GradeId == gradeId);
                                                if (getScoreObj == null)
                                                {
                                                    //Calculating the percentage for the first entry

                                                    decimal totalScore = Convert.ToDecimal(txtTotalMark.Text.Trim());
                                                    decimal tsScore = Convert.ToInt64(row.Cells[count + 3].Value) / totalScore;
                                                    int testPercentage = Convert.ToInt16(subCategory.Percentage);
                                                    decimal percentageScore = tsScore * testPercentage;
                                                    decimal ExamPercentageScore = Convert.ToDecimal((percentageScore / 100) * scoreCategory.Percentage);
                                                    decimal? finalScore = (ExamPercentageScore * subSch.MaximumScore) / 100;

                                                    scores.AdmissionNumber = row.Cells[2].Value.ToString();
                                                    scores.StudentId = student.Id;
                                                    scores.ExamScoreObtainable = Convert.ToInt16(txtTotalMark.Text.Trim());
                                                    scores.ExamScore = Convert.ToDecimal(row.Cells[count + 3].Value);
                                                    scores.TermId = termId;
                                                    scores.AcademicSessionID = sessionId;
                                                    scores.ClassId = Convert.ToInt64(ddlYear.SelectedValue);
                                                    scores.GradeId = Convert.ToInt64(ddlGrade.SelectedValue);
                                                    scores.SubjectId = Convert.ToInt16(subId);
                                                    if (subSch.DepartmentId != null)
                                                    {
                                                        scores.DepartmentId = Convert.ToInt64(subSch.DepartmentId);
                                                    }
                                                    scores.Percentage = subCategory.Percentage;
                                                    scores.PercentageScore = percentageScore;
                                                    scores.ExamPercentage = scoreCategory.Percentage;
                                                    scores.ExamPercentageScore = ExamPercentageScore;
                                                    scores.SubjectMaxScore = subSch.MaximumScore;
                                                    scores.FinalScore = finalScore;
                                                    scores.CategoryId = scoreCategory.Id;
                                                    scores.SubCategoryId = subCategory.Id;
                                                    //score.DepartmentId = departmentId;
                                                    scores.CampusId = logonUser.SchoolCampusId;
                                                    scores.SchoolId = logonUser.SchoolId;
                                                    if (subTeacher != null)
                                                    {
                                                        scores.SubjectTeacherId = Convert.ToInt64(subTeacher.TeacherId);
                                                    }
                                                    else { scores.SubjectTeacherId = logonUser.Id; }
                                                    scores.UploadedById = logonUser.Id;
                                                    scores.BroadSheetTemplateID = broadsheettemplate.ID;
                                                    //scores.Remark = txtRemark.Text.Trim();
                                                    scores.Count = 1;
                                                    //score.Description = txtDescription.Text.Trim();
                                                    scores.Date = DateTime.Now;
                                                    //score.TestAssigenmentBroadSheetTemplateID = TestAssigenmentBroadSheetTemplateID;
                                                    context.StudentScores.InsertOnSubmit(scores);
                                                    context.SubmitChanges();
                                                    //scoreList.Add(score);
                                                    //new ScoresheetLIB().SaveStudentTestAssignmentScore(scoreList);
                                                }
                                                else
                                                {
                                                    //decimal totalScore = Convert.ToDecimal(txtTotalMark.Text.Trim());
                                                    decimal totalScore = Convert.ToDecimal(txtTotalMark.Text.Trim()) + Convert.ToDecimal(getScoreObj.ExamScoreObtainable);
                                                    decimal newScore = Convert.ToInt64(row.Cells[count + 3].Value) + Convert.ToDecimal(getScoreObj.ExamScore);
                                                    decimal tsScore = newScore / totalScore;
                                                    int examPercentage = Convert.ToInt16(subCategory.Percentage);
                                                    decimal percentageScore = tsScore * examPercentage;
                                                    decimal ExamPercentageScore = Convert.ToDecimal((percentageScore / 100) * scoreCategory.Percentage);
                                                    decimal? finalScore = (ExamPercentageScore * subSch.MaximumScore) / 100;

                                                    getScoreObj.AdmissionNumber = row.Cells[2].Value.ToString();
                                                    getScoreObj.StudentId = student.Id;
                                                    getScoreObj.ExamScoreObtainable = Convert.ToInt16(totalScore);
                                                    getScoreObj.ExamScore = Convert.ToDecimal(newScore);
                                                    getScoreObj.TermId = termId;
                                                    getScoreObj.AcademicSessionID = sessionId;
                                                    getScoreObj.ClassId = Convert.ToInt64(ddlYear.SelectedValue);
                                                    getScoreObj.GradeId = Convert.ToInt64(ddlGrade.SelectedValue);
                                                    getScoreObj.SubjectId = Convert.ToInt16(subId);
                                                    if (subSch.DepartmentId != null)
                                                    {
                                                        getScoreObj.DepartmentId = Convert.ToInt64(subSch.DepartmentId);
                                                    }
                                                    getScoreObj.Percentage = subCategory.Percentage;
                                                    getScoreObj.PercentageScore = percentageScore;
                                                    getScoreObj.ExamPercentage = scoreCategory.Percentage;
                                                    getScoreObj.ExamPercentageScore = ExamPercentageScore;
                                                    getScoreObj.SubjectMaxScore = subSch.MaximumScore;
                                                    getScoreObj.FinalScore = finalScore;
                                                    getScoreObj.CategoryId = scoreCategory.Id;
                                                    getScoreObj.SubCategoryId = subCategory.Id;
                                                    getScoreObj.CampusId = logonUser.SchoolCampusId;
                                                    getScoreObj.SchoolId = logonUser.SchoolId;
                                                    if (subTeacher != null)
                                                    {
                                                        getScoreObj.SubjectTeacherId = Convert.ToInt64(subTeacher.TeacherId);
                                                    }
                                                    getScoreObj.UploadedById = logonUser.Id;
                                                    getScoreObj.BroadSheetTemplateID = broadsheettemplate.ID;
                                                    //getScoreObj.Remark = txtRemark.Text.Trim();
                                                    //getScoreObj.Description = txtDescription.Text.Trim();
                                                    getScoreObj.Count = getScoreObj.Count + 1;
                                                    getScoreObj.Date = DateTime.Now;
                                                    //score.TestAssigenmentBroadSheetTemplateID = TestAssigenmentBroadSheetTemplateID;
                                                    //scoreList.Add(getScoreObj);
                                                    context.SubmitChanges();
                                                }
                                                score.StatusCode = "C";
                                                context.SubmitChanges();

                                            }
                                        }
                                        //PASSISLIBDataContext context = new PASSISLIBDataContext();
                                        //context.StudentScoreRepositories.InsertOnSubmit(scoresFound);
                                        //context.SubmitChanges();

                                        //}


                                        count++;

                                    }

                                    //try
                                    //{
                                    //    foreach (StudentScoreRepository newscore in scoresFound)
                                    //    {

                                    //        context.StudentScoreRepositories.InsertOnSubmit(newscore);
                                    //        context.SubmitChanges();
                                    //    }
                                    //}
                                    //catch (Exception ex)
                                    //{ throw ex; }
                                    //new ScoresheetLIB().SaveStudentTestAssignmentScore(scoresFound);

                                    //context.SubmitChanges();

                                }
                            //}
                            //catch (Exception ex) { throw ex; }


                        }

                        // IList<StudentScoreRepository> scoreList = PASSIS.LIB.Utility.Utili.RetrieveStudentTestAssignmentScoresFromScoresheetBroad(fileLocation, termId, sessionId, logonUser.Id, Convert.ToInt32(subId), (long)logonUser.SchoolId, logonUser.SchoolCampusId, markObtainable, broadsheettemplate.ID);


                        lblErrorMsg.Text = "Uploaded Successfully";
                        lblErrorMsg.ForeColor = System.Drawing.Color.Green;
                        lblErrorMsg.Visible = true;
                        ClearContent();
                        TestAssigenmentBroadSheetTemplate objTemplate = context.TestAssigenmentBroadSheetTemplates.FirstOrDefault(x => x.ID == broadsheettemplate.ID);
                        objTemplate.HasSubmitted = true;
                        context.SubmitChanges();//update result has been submitted

                    }
                    else
                    {
                        lblErrorMsg.Text = "Exam has been submitted or wrong code selected";
                        lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                        lblErrorMsg.Visible = true;
                    }
                }

                else
                {
                    lblErrorMsg.Text = "Kindly confirm you are uploading against previously generated template";
                    lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                    lblErrorMsg.Visible = true;
                }


            }

            else
            {
                lblErrorMsg.Text = "Kindly select the excel file to upload";
                lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                lblErrorMsg.Visible = true;
            }
        }

        if (ddlCategory.SelectedItem.Text == "CA")
        {
            ScoreSubCategoryConfiguration subCategory = context.ScoreSubCategoryConfigurations.FirstOrDefault(x => x.Id == Convert.ToInt64(ddlSubCategory.SelectedValue));
            if (subCategory == null)
            {
                lblErrorMsg.Text = "Kindly set the score sub category";
                lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                lblErrorMsg.Visible = true;
                return;
            }
            if (txtCode.Text == "")
            {
                lblErrorMsg.Text = "Kindly enter the code";
                lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                lblErrorMsg.Visible = true;
                return;
            }




            string TemplateCode = ddlDescription.SelectedItem.Text.ToString();

            //confirm if file to be uploaded has been selected else notify the user to select file to upload
            if (documentUpload.HasFile)
            {

                string originalFileName = Path.GetFileName(documentUpload.PostedFile.FileName);
                string fileExtension = Path.GetExtension(documentUpload.PostedFile.FileName);

                //This is use to confirm if user is uploading against the previously generated template
                TestAssigenmentBroadSheetTemplate broadsheettemplate = db.TestAssigenmentBroadSheetTemplates.FirstOrDefault(x => x.BroadSheetDescriptionCode.DescriptionName == TemplateCode);

                //If template exist
                if (broadsheettemplate != null)
                {
                    //Confirm if the result has been uploaded
                    if (broadsheettemplate.HasSubmitted == false)
                    {
                        string[] subjectId = broadsheettemplate.SubjectId.Split(',');


                        string fileLocation = Server.MapPath("~/docs/ScoreSheets/") + originalFileName;
                        documentUpload.SaveAs(fileLocation);
                        IList<PASSIS.LIB.StudentScore> scoresFound = new List<PASSIS.LIB.StudentScore>();
                        Net.SourceForge.Koogra.Excel.Workbook wkbk = new Net.SourceForge.Koogra.Excel.Workbook(fileLocation);
                        Net.SourceForge.Koogra.Excel.Worksheet workSheet = wkbk.Sheets[0];
                        // long count = 0;
                        for (uint rowCount = workSheet.Rows.MinRow; rowCount <= workSheet.Rows.MaxRow; ++rowCount)
                        {
                            try
                            {


                                if (rowCount != workSheet.Rows.MinRow)// jump the first row
                                {

                                    //broadsheettemplate.TotalNumberofSubjectInserted = count;
                                    uint count = 0;
                                    uint newunit = 3;
                                    uint countnum;
                                    foreach (string subId in subjectId)
                                    {
                                        PASSIS.LIB.SubjectTeacher subTeacher = context.SubjectTeachers.FirstOrDefault(x => x.SubjectId == Convert.ToInt64(subId));
                                        PASSIS.LIB.Subject subject = context.Subjects.FirstOrDefault(x => x.Id == Convert.ToInt64(subId));
                                        PASSIS.LIB.SubjectsInSchool subSch = context.SubjectsInSchools.FirstOrDefault(x => x.SubjectId == subject.Id && x.SchoolId == logonUser.SchoolId);
                                        //for (uint count = 0; count <= broadsheettemplate.TotalNumberofSubjectInserted; count++ )
                                        //{
                                        // countnum = count + newunit ;
                                        if (count <= broadsheettemplate.TotalNumberofSubjectInserted)
                                        {
                                            Net.SourceForge.Koogra.Excel.Row row = workSheet.Rows[rowCount];
                                            if (row.Cells[count + 3] != null)
                                            {
                                                PASSIS.LIB.User student = db.Users.FirstOrDefault(x => x.AdmissionNumber == row.Cells[2].Value.ToString().Trim() && x.SchoolId == logonUser.SchoolId && x.SchoolCampusId == logonUser.SchoolCampusId);

                                                StudentScoreRepositoryTransaction trans = context.StudentScoreRepositoryTransactions.FirstOrDefault(x => x.TestAssigenmentBroadSheetTemplateID == broadsheettemplate.ID
                                                    && x.Code == Convert.ToInt16(txtCode.Text) && x.StudentId == student.Id && x.SubjectId == Convert.ToInt64(subId)
                                                    && x.CategoryId == Convert.ToInt64(ddlCategory.SelectedValue) && x.SubCategoryId == Convert.ToInt64(ddlSubCategory.SelectedValue)
                                                    && x.TermId == termId && x.SessionId == sessionId && x.ClassId == yearId && x.GradeId == gradeId);
                                                if (Convert.ToInt16(txtCode.Text) < 1)
                                                {
                                                    lblErrorMsg.Text = "Code should not be lesser than 1";
                                                    lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                                                    lblErrorMsg.Visible = true;
                                                    return;
                                                }

                                                if (trans != null)
                                                {
                                                    lblErrorMsg.Text = "Code has been used for this sub category";
                                                    lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                                                    lblErrorMsg.Visible = true;
                                                    continue;
                                                }
                                                else
                                                {
                                                    StudentScoreRepositoryTransaction transs = context.StudentScoreRepositoryTransactions.FirstOrDefault(x => x.TestAssigenmentBroadSheetTemplateID == broadsheettemplate.ID && x.Code == Convert.ToInt16(txtCode.Text) - 1 && x.StudentId == student.Id && x.SubjectId == Convert.ToInt64(subId)
                                                        && x.CategoryId == Convert.ToInt64(ddlCategory.SelectedValue) && x.SubCategoryId == Convert.ToInt64(ddlSubCategory.SelectedValue)
                                                        && x.TermId == termId && x.SessionId == sessionId && x.ClassId == yearId && x.GradeId == gradeId);
                                                    if (transs == null && Convert.ToInt16(txtCode.Text) - 1 != 0)
                                                    {
                                                        lblErrorMsg.Text = "Enter lesser number for the code";
                                                        lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                                                        lblErrorMsg.Visible = true;
                                                        return;
                                                    }
                                                }
                                                PASSIS.LIB.StudentScoreRepositoryTransaction score = new PASSIS.LIB.StudentScoreRepositoryTransaction();
                                                PASSIS.LIB.StudentScoreRepository scores = new StudentScoreRepository();
                                                //Net.SourceForge.Koogra.Excel.Row row = new Net.SourceForge.Koogra.Excel.Row();
                                                //Net.SourceForge.Koogra.Excel.Row row = workSheet.Rows[rowCount];
                                                //do validation when u hv time 
                                                //if (row.Cells[count + 3].Value.ToString() != "")

                                                try
                                                { score.AdmissionNo = row.Cells[2].Value.ToString(); }
                                                catch { }
                                                score.StudentId = student.Id;
                                                try { score.MarkObtained = Convert.ToInt64(row.Cells[count + 3].Value); }
                                                catch { }
                                                score.MarkObtainable = Convert.ToInt16(txtTotalMark.Text);
                                                score.CategoryId = Convert.ToInt64(ddlCategory.SelectedValue);
                                                score.SubCategoryId = Convert.ToInt64(ddlSubCategory.SelectedValue);
                                                score.TermId = termId;
                                                score.SessionId = sessionId;
                                                score.SubjectId = Convert.ToInt32(subId);
                                                if (subSch.DepartmentId != null)
                                                {
                                                    score.DepartmentId = Convert.ToInt64(subSch.DepartmentId);
                                                }
                                                score.CampusId = logonUser.SchoolCampusId;
                                                score.SchoolId = logonUser.SchoolId;
                                                if (subTeacher != null)
                                                {
                                                    score.SubjectTeacherId = Convert.ToInt64(subTeacher.TeacherId);
                                                }
                                                score.UploadedById = UploadedById;
                                                score.TestAssigenmentBroadSheetTemplateID = broadsheettemplate.ID;
                                                score.ClassId = Convert.ToInt64(ddlYear.SelectedValue);
                                                score.GradeId = Convert.ToInt64(ddlGrade.SelectedValue);
                                                score.Description = ddlDescription.SelectedItem.Text;
                                                score.Code = Convert.ToInt16(txtCode.Text);
                                                score.Date = DateTime.Now;
                                                score.StatusCode = "I";
                                                score.IsCancelled = false;
                                                context.StudentScoreRepositoryTransactions.InsertOnSubmit(score);
                                                context.SubmitChanges();

                                                StudentScoreRepository getScoreObj = context.StudentScoreRepositories.FirstOrDefault(x => x.AdmissionNo == row.Cells[2].Value.ToString() && x.StudentId == student.Id && x.TestAssigenmentBroadSheetTemplateID == broadsheettemplate.ID && x.SubjectId == Convert.ToInt64(subId)
                                                    && x.CategoryId == Convert.ToInt64(ddlCategory.SelectedValue) && x.SubCategoryId == Convert.ToInt64(ddlSubCategory.SelectedValue) && x.TermId == termId && x.SessionId == sessionId && x.ClassId == yearId && x.GradeId == gradeId);
                                                if (getScoreObj == null)
                                                {
                                                    //Calculating the percentage for the first entry

                                                    decimal totalScore = Convert.ToDecimal(txtTotalMark.Text.Trim());
                                                    decimal tsScore = Convert.ToInt64(row.Cells[count + 3].Value) / totalScore;
                                                    int testPercentage = Convert.ToInt16(subCategory.Percentage);
                                                    decimal percentageScore = tsScore * testPercentage;
                                                    decimal CAPercentageScore = Convert.ToDecimal((percentageScore / 100) * scoreCategory.Percentage);
                                                    decimal? finalScore = (CAPercentageScore * subSch.MaximumScore) / 100;

                                                    scores.AdmissionNo = row.Cells[2].Value.ToString();
                                                    scores.StudentId = student.Id;
                                                    scores.MarkObtainable = Convert.ToInt16(txtTotalMark.Text.Trim());
                                                    scores.MarkObtained = Convert.ToDecimal(row.Cells[count + 3].Value);
                                                    scores.TermId = termId;
                                                    scores.SessionId = sessionId;
                                                    scores.ClassId = Convert.ToInt64(ddlYear.SelectedValue);
                                                    scores.GradeId = Convert.ToInt64(ddlGrade.SelectedValue);
                                                    scores.SubjectId = Convert.ToInt16(subId);
                                                    if (subSch.DepartmentId != null)
                                                    {
                                                        scores.DepartmentId = Convert.ToInt64(subSch.DepartmentId);
                                                    }
                                                    scores.Percentage = subCategory.Percentage;
                                                    scores.PercentageScore = percentageScore;
                                                    scores.CAPercentage = scoreCategory.Percentage;
                                                    scores.CAPercentageScore = CAPercentageScore;
                                                    scores.SubjectMaxScore = subSch.MaximumScore;
                                                    scores.FinalScore = finalScore;
                                                    scores.CategoryId = scoreCategory.Id;
                                                    scores.SubCategoryId = subCategory.Id;
                                                    //score.DepartmentId = departmentId;
                                                    scores.CampusId = logonUser.SchoolCampusId;
                                                    scores.SchoolId = logonUser.SchoolId;
                                                    if (subTeacher != null)
                                                    {
                                                        scores.SubjectTeacherId = Convert.ToInt64(subTeacher.TeacherId);
                                                    }
                                                    scores.UploadedById = logonUser.Id;
                                                    scores.TestAssigenmentBroadSheetTemplateID = broadsheettemplate.ID;
                                                    //scores.Remark = txtRemark.Text.Trim();
                                                    scores.Count = 1;
                                                    //score.Description = txtDescription.Text.Trim();
                                                    scores.Date = DateTime.Now;
                                                    //score.TestAssigenmentBroadSheetTemplateID = TestAssigenmentBroadSheetTemplateID;
                                                    context.StudentScoreRepositories.InsertOnSubmit(scores);
                                                    context.SubmitChanges();
                                                    //scoreList.Add(score);
                                                    //new ScoresheetLIB().SaveStudentTestAssignmentScore(scoreList);
                                                }
                                                else
                                                {
                                                    //decimal totalScore = Convert.ToDecimal(txtTotalMark.Text.Trim());
                                                    decimal totalScore = Convert.ToDecimal(txtTotalMark.Text.Trim()) + Convert.ToDecimal(getScoreObj.MarkObtainable);
                                                    decimal newScore = Convert.ToInt64(row.Cells[count + 3].Value) + Convert.ToDecimal(getScoreObj.MarkObtained);
                                                    decimal tsScore = newScore / totalScore;
                                                    int testPercentage = Convert.ToInt16(subCategory.Percentage);
                                                    decimal percentageScore = tsScore * testPercentage;
                                                    decimal CAPercentageScore = Convert.ToDecimal((percentageScore / 100) * scoreCategory.Percentage);
                                                    decimal? finalScore = (CAPercentageScore * subSch.MaximumScore) / 100;

                                                    getScoreObj.AdmissionNo = row.Cells[2].Value.ToString();
                                                    getScoreObj.StudentId = student.Id;
                                                    getScoreObj.MarkObtainable = Convert.ToInt16(totalScore);
                                                    getScoreObj.MarkObtained = Convert.ToDecimal(newScore);
                                                    getScoreObj.TermId = termId;
                                                    getScoreObj.SessionId = sessionId;
                                                    getScoreObj.ClassId = Convert.ToInt64(ddlYear.SelectedValue);
                                                    getScoreObj.GradeId = Convert.ToInt64(ddlGrade.SelectedValue);
                                                    getScoreObj.SubjectId = Convert.ToInt16(subId);
                                                    if (subSch.DepartmentId != null)
                                                    {
                                                        getScoreObj.DepartmentId = Convert.ToInt64(subSch.DepartmentId);
                                                    }
                                                    getScoreObj.Percentage = subCategory.Percentage;
                                                    getScoreObj.PercentageScore = percentageScore;
                                                    getScoreObj.CAPercentage = scoreCategory.Percentage;
                                                    getScoreObj.CAPercentageScore = CAPercentageScore;
                                                    getScoreObj.SubjectMaxScore = subSch.MaximumScore;
                                                    getScoreObj.FinalScore = finalScore;
                                                    getScoreObj.CategoryId = scoreCategory.Id;
                                                    getScoreObj.SubCategoryId = subCategory.Id;
                                                    getScoreObj.CampusId = logonUser.SchoolCampusId;
                                                    getScoreObj.SchoolId = logonUser.SchoolId;
                                                    if (subTeacher != null)
                                                    {
                                                        getScoreObj.SubjectTeacherId = Convert.ToInt64(subTeacher.TeacherId);
                                                    }
                                                    getScoreObj.UploadedById = logonUser.Id;
                                                    getScoreObj.TestAssigenmentBroadSheetTemplateID = broadsheettemplate.ID;
                                                    //getScoreObj.Remark = txtRemark.Text.Trim();
                                                    //getScoreObj.Description = txtDescription.Text.Trim();
                                                    getScoreObj.Count = getScoreObj.Count + 1;
                                                    getScoreObj.Date = DateTime.Now;
                                                    //score.TestAssigenmentBroadSheetTemplateID = TestAssigenmentBroadSheetTemplateID;
                                                    //scoreList.Add(getScoreObj);
                                                    context.SubmitChanges();
                                                }

                                                score.StatusCode = "C";
                                                context.SubmitChanges();
                                            }
                                        }
                                        //PASSISLIBDataContext context = new PASSISLIBDataContext();
                                        //context.StudentScoreRepositories.InsertOnSubmit(scoresFound);
                                        //context.SubmitChanges();

                                        //}


                                        count++;

                                    }

                                    //try
                                    //{
                                    //    foreach (StudentScoreRepository newscore in scoresFound)
                                    //    {

                                    //        context.StudentScoreRepositories.InsertOnSubmit(newscore);
                                    //        context.SubmitChanges();
                                    //    }
                                    //}
                                    //catch (Exception ex)
                                    //{ throw ex; }
                                    //new ScoresheetLIB().SaveStudentTestAssignmentScore(scoresFound);

                                    //context.SubmitChanges();

                                }
                            }
                            catch (Exception ex) { throw ex; }


                        }

                        // IList<StudentScoreRepository> scoreList = PASSIS.LIB.Utility.Utili.RetrieveStudentTestAssignmentScoresFromScoresheetBroad(fileLocation, termId, sessionId, logonUser.Id, Convert.ToInt32(subId), (long)logonUser.SchoolId, logonUser.SchoolCampusId, markObtainable, broadsheettemplate.ID);


                        lblErrorMsg.Text = "Uploaded Successfully";
                        lblErrorMsg.ForeColor = System.Drawing.Color.Green;
                        lblErrorMsg.Visible = true;
                        ClearContent();
                        TestAssigenmentBroadSheetTemplate objTemplate = context.TestAssigenmentBroadSheetTemplates.FirstOrDefault(x => x.ID == broadsheettemplate.ID);

                        objTemplate.HasSubmitted = true;
                        context.SubmitChanges();//update result has been submitted

                    }
                    else
                    {
                        lblErrorMsg.Text = "Exam has been submitted or wrong code selected";
                        lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                        lblErrorMsg.Visible = true;
                    }
                }

                else
                {
                    lblErrorMsg.Text = "Kindly confirm you are uploading against previously generated template";
                    lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                    lblErrorMsg.Visible = true;
                }


            }

            else
            {
                lblErrorMsg.Text = "Kindly select the excel file to upload";
                lblErrorMsg.ForeColor = System.Drawing.Color.Red;
                lblErrorMsg.Visible = true;
            }
        }
        //}
        //catch (Exception ex)
        //{
        //    lblErrorMsg.Text = "Error occurred, kindly contact your administrator";
        //    lblErrorMsg.ForeColor = System.Drawing.Color.Red;
        //    lblErrorMsg.Visible = true;
        //}
    }

    private void ClearContent()
    {

        ddlDescription.SelectedIndex = 0;
        ddlGrade.SelectedIndex = 0;
        ddlSession.SelectedIndex = 0;
        ddlTerm.SelectedIndex = 0;
        ddlYear.SelectedIndex = 0;

    }
    protected void ddlCategory_SelectedIndexChanged(object sender, EventArgs e)
    {
        //Populate Sub Category
        ddlSubCategory.Items.Clear();
        var categoryList = from s in context.ScoreSubCategoryConfigurations where s.CategoryId == Convert.ToInt64(ddlCategory.SelectedValue) select s;
        ddlSubCategory.DataSource = categoryList;
        ddlSubCategory.DataBind();
        ddlSubCategory.Items.Insert(0, new ListItem("--Select--", "0", true));
    }
}