<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Review Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7ff;
            margin: 0;
            padding: 0;
        }

        .pdf-container {
            width: 100%;
            height: 90vh;
        }

        .sidebar {
            width: 40%;
            padding: 20px;
            float: right;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .instructions {
            font-size: 16px;
            line-height: 1.5;
        }

        /* .input-focus {
         background-color: lightblue; 
         border: 2px solid blue; 
         box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
      } */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
        }

        select,
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .arrow {
            margin-left: 10px;
            width: 0;
            height: 0;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            border-left: 5px solid white;
        }

        .hidden {
            display: none;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .nxtbtn {
            margin-top: 10px;
        }

        .radio-options {
            display: flex;
            align-items: center;
            margin-left: 20px;
            margin-right: 20px;
        }

        .radio-options label {
            flex: 1;
            margin-right: 1px;
            /* Adjust as needed for spacing 
         } 

         .radio-options input[type="radio"] { 
            margin-right: 1px; 
            /* Adjust as needed for spacing */
        }
    </style>
</head>

<body>
    <?php include 'nav.php' ?>
    <?php
    // Check if the textbook_id and file_path query parameters are set
    if (isset($_GET['textbook_id']) && isset($_GET['file_path'])) {
        $textbookId = $_GET['textbook_id'];
        $file_path = $_GET['file_path'];

        // Validate that the file path is a PDF (optional)
        $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        if ($file_extension === 'pdf') {
            echo '<embed src="' . $file_path . '" type="application/pdf" width="59%" height="600px" />';
        } else {
            echo '<p>Invalid PDF file.</p>';
        }
    } else {
        echo '<p>Invalid request. Please select a valid book to review.</p>';
    }
    ?>
    <div class="sidebar">
        <h3>Instructions</h3>
        <div class="instructions">
            <p>A. Author Credibility </p>
            <p>B. Publisher Credibility</p>
            <p>C. In General</p>
            <p>D. Physical Apperance, Structure & Organization</p>
            <p>E. Subject Matter</p>
            <p>F. Language</p>
            <p>G. Illustrations</p>
            <a href="https://ncismindia.org/Textbook%20Quality%20Assessment%20Scale.pdf" target="_blank">For More Details Click HERE...</a>
        </div>
    </div>

    <hr>


    </div>
    <div class="form-container">
        <h2>Textbook Quality Assessment</h2>
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <div class="step active" id="step0">
                <button type="button" onclick="showStep(1);">Start Assessment</button>
            </div>

            <!-- Section 1 -->
            <div class="step" id="step1">
                <button type="button" onclick="showStep(0);">Previous</button>
                <h3>Author Credibility Assessment</h3>
                <?php
                if (isset($_GET['textbook_id'])) {
                    $textbook_id = $_GET['textbook_id'];
                    echo '<input type="hidden" name="textbook_id" value="' . $textbook_id . '">';
                } else {
                    echo 'Textbook ID not provided.';
                }
                ?> 
                <label>Name: </label>
                <input type="text" name="name" placeholder="Enter Your Name">
                <label>1. Number of Authors:</label>
                <input type="text" name="number_of_authors" placeholder="Enter a number (2, 4, 6, 8, or 10)">
                <label>2. Qualification:</label>
                <input type="text" name="qualification" placeholder="Enter a score (0-5)">

                <label>3. Experience (in years):</label>
                <input type="text" name="experience" placeholder="Enter a score (0-5)">

                <label>4. Expertise (Publications/Books):</label>
                <input type="text" name="expertise" placeholder="Enter a score (0-30)">
                <br>
                <button type="button" onclick="showStep(2);" class="nxtbtn">Next</button>
            </div>

            <!-- Section 2 -->
            <div class="step" id="step2">
                <button type="button" onclick="showStep(1);">Previous</button>
                <h3>Publisher Credibility Assessment</h3>
                <label>Publisher Credibility:</label>
                <input type="text" name="publisher_credibility" placeholder="Enter a score (0-25)">
                <!-- Add more input fields for this section -->
                <button type="button" onclick="showStep(3);" class="nxtbtn">Next</button>
            </div>

            <!-- Add more sections similarly -->
            <div class="step" id="step3">
                <!-- Section C: In General Assessment -->
                <button type="button" onclick="showStep(2);">Previous</button>
                <h3>In General Assessment</h3>
                <label>1. Uniqueness of the book (0-5 score):</label>
                <input type="text" name="uniqueness_score" placeholder="Enter a score (0-5)">

                <label class="radio-label">2. Whether the uniqueness claimed by the author has been conveyed clearly?</label>
                <div class="radio-options">
                    <input type="radio" name="uniqueness_conveyed_clearly" value="0"> No
                    <input type="radio" name="uniqueness_conveyed_clearly" value="1"> Yes
                    <input type="radio" name="uniqueness_conveyed_clearly" value="2"> Moderate extent
                    <input type="radio" name="uniqueness_conveyed_clearly" value="3"> Fully
                </div>

                <br>
                <br>

                <label class="radio-label">3. Whether the book stayed focus on the uniqueness as claimed by the author?</label>
                <div class="radio-options">
                    <input type="radio" name="stayed_focused_on_uniqueness" value="0"> No
                    <input type="radio" name="stayed_focused_on_uniqueness" value="1"> Yes
                    <input type="radio" name="stayed_focused_on_uniqueness" value="2"> Moderate extent
                    <input type="radio" name="stayed_focused_on_uniqueness" value="3"> Fully
                </div>
                <br>
                <br>

                <label class="radio-label">4. Whether the book is dealing with the entire curriculum & syllabus?</label>
                <div class="radio-options">
                    <input type="radio" name="deals_with_curriculum_syllabus" value="0"> No
                    <input type="radio" name="deals_with_curriculum_syllabus" value="1"> Yes
                    <input type="radio" name="deals_with_curriculum_syllabus" value="2"> Moderate extent
                    <input type="radio" name="deals_with_curriculum_syllabus" value="3"> Fully
                </div>
                <button type="button" onclick="showStep(4);" class="nxtbtn">Next</button>

            </div>
            <div class="step" id="step4">
                <!-- Section D: Physical Appearance, Structure & Organisation -->
                <button type="button" onclick="showStep(3);">Previous</button>
                <h3>Section D: Physical Appearance, Structure & Organisation</h3>

                <label>1. Attractiveness of Cover page (0-5 score):</label>
                <input type="text" name="cover_attractiveness" placeholder="Enter a score (0-5)">

                <label>2. Relevance of cover page design (0-5 score):</label>
                <input type="text" name="cover_relevance" placeholder="Enter a score (0-5)">

                <label>3. Size of the Book in respect to convenience of readers:</label>
                <label>Dimensions (0-5 score):</label>
                <input type="text" name="book_dimensions" placeholder="Enter a score (0-5)">

                <label>Bulkiness (0-5 score):</label>
                <input type="text" name="book_bulkiness" placeholder="Enter a score (0-5)">

                <label>4. Paper quality (0-5 score):</label>
                <input type="text" name="paper_quality" placeholder="Enter a score (0-5)">

                <label>5. Colours in Printing (0-5 score):</label>
                <input type="text" name="printing_colors" placeholder="Enter a score (0-5)">

                <label>6. Logical & Consistent page layout with appropriate line spacing & margins (No-0 score; Yes-1 score for every 20% of pages):</label>
                <input type="text" name="page_layout" placeholder="Enter a score (0-5)">

                <label>7. Font Type & Size and their consistency throughout the text:</label>

                <label>Type of font (0-10 score):</label>
                <input type="text" name="font_type" placeholder="Enter a score (0-10)">

                <label>Size of font (0-10 score):</label>
                <input type="text" name="font_size" placeholder="Enter a score (0-10)">

                <label>Consistency in maintaining type & size of font (0-10 score) (Commonly used font types are recommended. Appropriate font size to avoid eye strain is recommended. Different font types such as italics, Devanagari etc. for easy identification) (MAX SCORE: 30):</label>
                <input type="text" name="font_consistency" placeholder="Enter a score (0-10)">

                <label>8. Number of pages to the teaching hours & (total of theory and Practical/Clinicals) as specified by NCISM (<) 1:1=0; 1:1=5; 2:1=10; 3:1 and above: 15 (MAX SCORE: 15):</label>
                        <input type="text" name="teaching_hours" placeholder="Enter a score (0-15)">

                        <label>9. An overview of the learning objectives at the beginning of the chapter included? (No-0 score; Yes-1 score for every 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="learning_objectives" placeholder="Enter a score (0-5)">

                        <label>10. Is there an introductory section/chapter to explain readers what are the unique features of the book and how to use the book? (No-0 score; Yes Comprehensiveness of the chapter: 1-5 score) (MAX SCORE: 5):</label>
                        <input type="text" name="introductory_section" placeholder="Enter a score (0-5)">

                        <label>11. Is the table of contents well-structured (0-5 score)?</label>
                        <input type="text" name="table_of_contents" placeholder="Enter a score (0-5)">

                        <label>12. Is the book provided with a list of Abbreviations used in the book, Transliteration key, index etc. (No-0 score; Yes: To some extent 1, Moderate-3 & Fully-5 score):</label>
                        <input type="text" name="abbreviations" placeholder="Enter a score (0-5)">

                        <label>13. Summary of the chapter at the beginning or at the end of the chapter has been included? (No-0 score; Yes-1 score for each 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="chapter_summary" placeholder="Enter a score (0-5)">

                        <label>14. Whether the text is structured as chapter titles, headings, captions, text boxes, etc.? (No-0 score; Yes-1 score for each 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="text_structure" placeholder="Enter a score (0-5)">

                        <label>15. Whether the content is included with varied and meaningful activities, tasks, and exercises that are appropriate to the content? (No-0 score; Yes-1 score for each 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="content_activities" placeholder="Enter a score (0-5)">

                        <label>16. The topic distribution and sequencing are appropriate and logical? (No-0 score; Yes-5 score):</label>
                        <input type="text" name="topic_distribution" placeholder="Enter a score (0-5)">

                        <label>17. Key words and concepts are identified and highlighted? (No-0 score; Yes-1 score for each 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="highlighted_keywords" placeholder="Enter a score (0-5)">

                        <label>18. Free from the mistakes and reiteration? (No-0 score; Yes-1 score for each 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="mistakes_and_reiteration" placeholder="Enter a score (0-5)">
                        <button type="button" onclick="showStep(5);" class="nxtbtn">Next</button>

            </div>

            <div class="step" id="step5">
                <!-- Section E: Subject Matter -->
                <button type="button" onclick="showStep(4);">Previous</button>
                <h3>Section E: Subject Matter</h3>
                <label>1. Compilation of classical references (0-5 score):</label>
                <input type="text" name="classical_references" placeholder="Enter a score (0-5)">

                <label>Added with recent and relevant advances (0-5 score):</label>
                <input type="text" name="recent_advances" placeholder="Enter a score (0-5)">

                <label>Appropriately interpreted, discussed and logically concluded (0-5 score):</label>
                <input type="text" name="interpreted_concluded" placeholder="Enter a score (0-5)">

                <h4>2. The concepts</h4>
                <label>Clear & Accurate (0-5):</label>
                <input type="text" name="clear_accurate" placeholder="Enter a score (0-5)">

                <label>Comprehensiveness (0-5):</label>
                <input type="text" name="comprehensiveness" placeholder="Enter a score (0-5)">

                <label>Self-explanatory and do not require additional resources to understand (0-5):</label>
                <input type="text" name="self_explanatory" placeholder="Enter a score (0-5)">

                <label>Supported with authoritative references and evidences (0-5):</label>
                <input type="text" name="supported_references" placeholder="Enter a score (0-5)">

                <label>3. Consistency of content to entire curriculum & syllabus (1 score for every 20% of content):</label>
                <input type="text" name="consistency_to_curriculum" placeholder="Enter a score (0-5)">

                <label>4. Understandable to all three types of learners (advance, medium, and slow learners):</label>
                <input type="text" name="understandable_to_learners" placeholder="Enter a score (0-3)">

                <label>5. Is the matter facilitating students to learn directly and independently and construct meaning on their own:</label>
                <input type="text" name="facilitating_students_learn" placeholder="Enter a score (0-3)">

                <label>6. Is the content promoting higher-order thinking skills:</label>
                <input type="text" name="promoting_higher_order" placeholder="Enter a score (0-3)">

                <label>7. Content is with well-formed presentation, discussion, and conclusion:</label>
                <input type="text" name="well_formed_content" placeholder="Enter a score (0-3)">

                <label>8. Content reveals clear meaning & thought-provoking:</label>
                <input type="text" name="clear_meaning" placeholder="Enter a score (0-3)">

                <label>9. Content is focused on the main idea and no diversions, no irrelevant content:</label>
                <input type="text" name="focused_content" placeholder="Enter a score (0-3)">

                <label>10. Definitions explained well with suitable examples:</label>
                <input type="text" name="definitions_explained" placeholder="Enter a score (0-3)">

                <label>11. There are multiple perspectives and balanced viewpoints on issues:</label>
                <input type="text" name="balanced_viewpoints" placeholder="Enter a score (0-3)">

                <label>12. There is no bias in content, such as over-generalization and stereotyping:</label>
                <input type="text" name="no_bias_content" placeholder="Enter a score (0-3)">

                <label>13. The content and illustrations do not carry any form of discrimination on the grounds of gender, age, race, religion, culture, disability, etc.:</label>
                <input type="text" name="no_discrimination" placeholder="Enter a score (0-3)">

                <label>14. Included appropriate resources for further reading:</label>
                <input type="text" name="resources_for_reading" placeholder="Enter a score (0-3)">

                <label>15. Bibliography, References & Citations (0-5):</label>
                <input type="text" name="bibliography_citations" placeholder="Enter a score (0-5)">
                <button type="button" onclick="showStep(6);" class="nxtbtn">Next</button>
            </div>

            <div class="step" id="step6">
                <!-- Language Assessment -->
                <button type="button" onclick="showStep(5);">Previous</button>
                <h3>Language Assessment</h3>
                <!-- Language questions -->
                <label>1. Is the language used in the text simple?</label>
                <div class="radio-options">
                    <input type="radio" name="language_simple" value="0"> No
                    <input type="radio" name="language_simple" value="1"> Yes
                    <input type="radio" name="language_simple" value="2"> Moderate extent
                    <input type="radio" name="language_simple" value="3"> Fully
                </div>
                <label>2. Usage of Standard Technical Terminology</label>
                <div class="radio-options">
                    <input type="radio" name="standard_technical_terminology" value="0"> No
                    <input type="radio" name="standard_technical_terminology" value="1"> Yes
                    <input type="radio" name="standard_technical_terminology" value="2"> Moderate extent
                    <input type="radio" name="standard_technical_terminology" value="3"> Fully
                </div>
                <label>3. Usage of Standard Punctuation Marks & Symbols</label>
                <div class="radio-options">
                    <input type="radio" name="standard_punctuation_marks_symbols" value="0"> No
                    <input type="radio" name="standard_punctuation_marks_symbols" value="1"> Yes
                    <input type="radio" name="standard_punctuation_marks_symbols" value="2"> Moderate extent
                    <input type="radio" name="standard_punctuation_marks_symbols" value="3"> Fully
                </div>
                <label>4. The language is accurate and precise</label>
                <div class="radio-options">
                    <input type="radio" name="language_accurate_precise" value="0"> No
                    <input type="radio" name="language_accurate_precise" value="1"> Yes
                    <input type="radio" name="language_accurate_precise" value="2"> Moderate extent
                    <input type="radio" name="language_accurate_precise" value="3"> Fully
                </div>
                <label>5. Can the audience determine meanings of difficult or technical terms through context clues?</label>
                <div class="radio-options">
                    <input type="radio" name="context_clues_for_difficult_terms" value="0"> No
                    <input type="radio" name="context_clues_for_difficult_terms" value="1"> Yes
                    <input type="radio" name="context_clues_for_difficult_terms" value="2"> Moderate extent
                    <input type="radio" name="context_clues_for_difficult_terms" value="3"> Fully
                </div>
                <label>6. Is the text free from Grammatical mistakes, redundancies, wordiness, highfalutin and sexist language?</label>
                <div class="radio-options">
                    <input type="radio" name="free_from_grammatical_mistakes" value="0"> No
                    <input type="radio" name="free_from_grammatical_mistakes" value="1"> Yes
                    <input type="radio" name="free_from_grammatical_mistakes" value="2"> Moderate extent
                    <input type="radio" name="free_from_grammatical_mistakes" value="3"> Fully
                </div>
                <label>7. Is the text free from fragments, run-on, and overly complex sentences?</label>
                <div class="radio-options">
                    <input type="radio" name="free_from_fragments_runon_complex_sentences" value="0"> No
                    <input type="radio" name="free_from_fragments_runon_complex_sentences" value="1"> Yes
                    <input type="radio" name="free_from_fragments_runon_complex_sentences" value="2"> Moderate extent
                    <input type="radio" name="free_from_fragments_runon_complex_sentences" value="3"> Fully
                </div>
                <label>8. Are capitalization, spelling, and paragraphs used correctly?</label>
                <div class="radio-options">
                    <input type="radio" name="correct_capitalization_spelling_paragraphs" value="0"> No
                    <input type="radio" name="correct_capitalization_spelling_paragraphs" value="1"> Yes
                    <input type="radio" name="correct_capitalization_spelling_paragraphs" value="2"> Moderate extent
                    <input type="radio" name="correct_capitalization_spelling_paragraphs" value="3"> Fully
                </div>
                <button type="button" onclick="showStep(7);" class="nxtbtn">Next</button>
            </div>

            <div class="step" id="step7">
                <!-- Illustrations -->
                <button type="button" onclick="showStep(6);">Previous</button>
                <h3>Illustrations</h3>
                <label>1. Colour:</label>
                <input type="text" name="colour" placeholder="Score (0-10)">

                <label>2. Visibility of illustrations:</label>
                <label>Clarity/Resolution:</label>
                <input type="text" name="clarity_resolution" placeholder="Score (0-5)">

                <label>Colour:</label>
                <input type="text" name="visibility_color" placeholder="Score (0-5)">

                <label>Labelling:</label>
                <input type="text" name="labelling" placeholder="Score (0-5)">

                <label>3. Relevance to the content:</label>
                <input type="text" name="relevance_to_content" placeholder="Score (0-3)">
                <button type="button" onclick="showStep(8);" class="nxtbtn">Next</button>
            </div>

            <div class="step" id="step8">
                <!-- Ethical Issues -->
                <button type="button" onclick="showStep(7);">Previous</button>
                <h3>Ethical Issues</h3>
                <label>1. Fabrication & falsification of data:</label>
                <input type="radio" name="data_fabrication" value="Yes"> Yes
                <input type="radio" name="data_fabrication" value="No"> No
                <br>

                <label>2. Plagiarism:</label>
                <input type="radio" name="plagiarism" value="Yes"> Yes
                <input type="radio" name="plagiarism" value="No"> No
                <br>

                <label>3. Citation bias:</label>
                <input type="radio" name="citation_bias" value="Yes"> Yes
                <input type="radio" name="citation_bias" value="No"> No
                <br>
                <button type="submit" class="nxtbtn" value="submit">Submit Assessment</button>

            </div>
        </form>

    </div>
    <br>
    <br>
    <br>

</body>
<script>
    let currentStep = 0;

    function showStep(step) {
        const steps = document.querySelectorAll(".step");
        steps[currentStep].classList.remove("active");
        currentStep = step;
        steps[currentStep].classList.add("active");
    }

    function toggleSection(sectionId) {
        var section = document.getElementById(sectionId);
        section.style.display = (section.style.display === "none" || section.style.display === "") ? "block" : "none";
    }
</script>

</html>