<!DOCTYPE html>
<html>

<head>
    <title>Textbook Quality Assessment</title>
    <style>
        /* Add some basic styling for better presentation */
        body {
            font-family: Arial, sans-serif;
        }

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
            display: flex;
            align-items: center;
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
    </style>
    <script>
        function toggleSection(sectionId) {
            var section = document.getElementById(sectionId);
            section.style.display = (section.style.display === "none" || section.style.display === "") ? "block" : "none";
        }
    </script>
</head>

<body>
    <div class="form-container">
        <h2>Textbook Quality Assessment</h2>
        <form action="submit.php" method="post">

            <button type="button" onclick="toggleSection('authorCredibility')">
                Author Credibility Assessment
                <div class="arrow"></div>
            </button>

            <div id="authorCredibility" class="hidden">
                <h3>Author Credibility Assessment</h3>
                <label>1. Number of Authors:</label>
                <input type="text" name="authors" placeholder="Enter a number (2, 4, 6, 8, or 10)">

                <label>2. Qualification:</label>
                <input type="text" name="qualification" placeholder="Enter a score (0-5)">

                <label>3. Experience (in years):</label>
                <input type="text" name="experience" placeholder="Enter a score (0-5)">

                <label>4. Expertise (Publications/Books):</label>
                <input type="text" name="expertise" placeholder="Enter a score (0-30)">
            </div>

            <button type="button" onclick="toggleSection('publisherCredibility')">
                Publisher Credibility Assessment
                <div class="arrow"></div>
            </button>

            <div id="publisherCredibility" class="hidden">
                <h3>Publisher Credibility Assessment</h3>
                <label>Publisher Credibility:</label>
                <input type="text" name="publisherCredibility" placeholder="Enter a score (0-25)">
            </div>
            <button type="button" onclick="toggleSection('inGeneral')">
                In General Assessment
                <div class="arrow"></div>
            </button>

            <button type="button" onclick="toggleSection('inGeneral')">
                In General Assessment
                <div class="arrow"></div>
            </button>

            <div id="inGeneral" class="hidden">
                <h3>In General Assessment</h3>
                <label>1. Uniqueness of the book (0-5 score):</label>
                <input type="text" name="uniqueness" placeholder="Enter a score (0-5)">

                <label class="radio-label">2. Whether the uniqueness claimed by the author has been conveyed clearly?</label>
                <input type="radio" name="conveyedClearly" value="0"> No
                <input type="radio" name="conveyedClearly" value="1"> Yes (To some extent)
                <input type="radio" name="conveyedClearly" value="2"> Moderate extent
                <input type="radio" name="conveyedClearly" value="3"> Fully
                <br>
                <br>

                <label class="radio-label">3. Whether the book stayed focus on the uniqueness as claimed by the author?</label>
                <input type="radio" name="focusOnUniqueness" value="0"> No
                <input type="radio" name="focusOnUniqueness" value="1"> Yes (To some extent)
                <input type="radio" name="focusOnUniqueness" value="2"> Moderate extent
                <input type="radio" name="focusOnUniqueness" value="3"> Fully
                <br>
                <br>

                <label class="radio-label">4. Whether the book is dealing with the entire curriculum & syllabus?</label>
                <input type="radio" name="dealingWithCurriculum" value="0"> No
                <input type="radio" name="dealingWithCurriculum" value="1"> Yes (To some extent)
                <input type="radio" name="dealingWithCurriculum" value="2"> Moderate extent
                <input type="radio" name="dealingWithCurriculum" value="3"> Fully
                <br>
                <br>

            </div>
            <button type="button" onclick="toggleSection('physicalAppearance')">
                Section D: Physical Appearance, Structure & Organisation
                <div class="arrow"></div>
            </button>

            <div id="physicalAppearance" class="hidden">
                <h3>Section D: Physical Appearance, Structure & Organisation</h3>

                <label>1. Attractiveness of Cover page (0-5 score):</label>
                <input type="text" name="coverAttractiveness" placeholder="Enter a score (0-5)">

                <label>2. Relevance of cover page design (0-5 score):</label>
                <input type="text" name="coverRelevance" placeholder="Enter a score (0-5)">

                <label>3. Size of the Book – in respect to convenience of readers:</label>
                <label>Dimensions (0-5 score):</label>
                <input type="text" name="bookDimensions" placeholder="Enter a score (0-5)">

                <label>Bulkiness (0-5 score):</label>
                <input type="text" name="bookBulkiness" placeholder="Enter a score (0-5)">

                <label>4. Paper quality (0-5 score):</label>
                <input type="text" name="paperQuality" placeholder="Enter a score (0-5)">

                <label>5. Colours in Printing (0-5 score):</label>
                <input type="text" name="printingColors" placeholder="Enter a score (0-5)">

                <label>6. Logical & Consistent page layout with appropriate line spacing & margins (No-0 score; Yes-1 score for every 20% of pages):</label>
                <input type="text" name="pageLayout" placeholder="Enter a score (0-5)">

                <label>7. Font Type & Size and their consistency throughout the text:</label>

                <label>Type of font (0-10 score):</label>
                <input type="text" name="fontType" placeholder="Enter a score (0-10)">

                <label>Size of font (0-10 score):</label>
                <input type="text" name="fontSize" placeholder="Enter a score (0-10)">

                <label>Consistency in maintaining type & size of font (0-10 score) (Commonly used font types are recommended. Appropriate font size to avoid eye strain is recommended. Different font types such as italics, Devanagari etc. for easy identification) (MAX SCORE: 30):</label>
                <input type="text" name="fontConsistency" placeholder="Enter a score (0-10)">

                <label>8. Number of pages to the teaching hours & (total of theory and Practical/Clinicals) as specified by NCISM <1:1=0; 1:1=5; 2:1=10; 3:1 and above: 15 (MAX SCORE: 15):</label>
                        <input type="text" name="teachingHours" placeholder="Enter a score (0-15)">

                        <label>9. An overview of the learning objectives at the beginning of the chapter included? (No-0 score; Yes-1 score for every 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="learningObjectives" placeholder="Enter a score (0-5)">

                        <label>10. Is there an introductory section/chapter to explain readers what are the unique features of the book and how to use the book? (No-0 score; Yes Comprehensiveness of the chapter: 1-5 score) (MAX SCORE: 5):</label>
                        <input type="text" name="introductorySection" placeholder="Enter a score (0-5)">

                        <label>11. Is the table of contents well-structured (0-5 score)?</label>
                        <input type="text" name="tableOfContents" placeholder="Enter a score (0-5)">

                        <label>12. Is the book provided with a list of Abbreviations used in the book, Transliteration key, index etc. (No-0 score; Yes: To some extent 1, Moderate-3 & Fully-5 score):</label>
                        <input type="text" name="abbreviations" placeholder="Enter a score (0-5)">

                        <label>13. Summary of the chapter at the beginning or at the end of the chapter has been included? (No-0 score; Yes-1 score for each 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="chapterSummary" placeholder="Enter a score (0-5)">

                        <label>14. Whether the text is structured as chapter titles, headings, captions, text boxes, etc.? (No-0 score; Yes-1 score for each 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="textStructure" placeholder="Enter a score (0-5)">

                        <label>15. Whether the content is included with varied and meaningful activities, tasks, and exercises that are appropriate to the content? (No-0 score; Yes-1 score for each 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="contentActivities" placeholder="Enter a score (0-5)">

                        <label>16. The topic distribution and sequencing are appropriate and logical? (No-0 score; Yes-5 score):</label>
                        <input type="text" name="topicDistribution" placeholder="Enter a score (0-5)">

                        <label>17. Key words and concepts are identified and highlighted? (No-0 score; Yes-1 score for each 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="highlightedKeywords" placeholder="Enter a score (0-5)">

                        <label>18. Free from the mistakes and reiteration? (No-0 score; Yes-1 score for each 20% of chapters) (MAX SCORE: 5):</label>
                        <input type="text" name="mistakesAndReiteration" placeholder="Enter a score (0-5)">
            </div>
            <button type="button" onclick="toggleSection('sectionE')">
                Section E: Subject Matter
                <div class="arrow"></div>
            </button>

            <div id="sectionE" class="hidden">
                <h3>Section E: Subject Matter</h3>
                <label>1. Compilation of classical references (0-5 score):</label>
                <input type="text" name="classicalReferences" placeholder="Enter a score (0-5)">

                <label>Added with recent and relevant advances (0-5 score):</label>
                <input type="text" name="recentAdvances" placeholder="Enter a score (0-5)">

                <label>Appropriately interpreted, discussed and logically concluded (0-5 score):</label>
                <input type="text" name="interpretedConcluded" placeholder="Enter a score (0-5)">

                <h4>2. The concepts</h4>
                <label>Clear & Accurate (0-5):</label>
                <input type="text" name="clearAccurate" placeholder="Enter a score (0-5)">

                <label>Comprehensiveness (0-5):</label>
                <input type="text" name="comprehensiveness" placeholder="Enter a score (0-5)">

                <label>Self-explanatory and do not require additional resources to understand (0-5):</label>
                <input type="text" name="selfExplanatory" placeholder="Enter a score (0-5)">

                <label>Supported with authoritative references and evidences (0-5):</label>
                <input type="text" name="supportedReferences" placeholder="Enter a score (0-5)">

                <label>3. Consistency of content to entire curriculum & syllabus (1 score for every 20% of content):</label>
                <input type="text" name="consistencyToCurriculum" placeholder="Enter a score (0-5)">

                <label>4. Understandable to all three types of learners (advance, medium, and slow learners):</label>
                <input type="text" name="understandableToLearners" placeholder="Enter a score (0-3)">

                <label>5. Is the matter facilitating students to learn directly and independently and construct meaning on their own:</label>
                <input type="text" name="facilitatingStudentsLearn" placeholder="Enter a score (0-3)">

                <label>6. Is the content promoting higher-order thinking skills:</label>
                <input type="text" name="promotingHigherOrder" placeholder="Enter a score (0-3)">

                <label>7. Content is with well-formed presentation, discussion, and conclusion:</label>
                <input type="text" name="wellFormedContent" placeholder="Enter a score (0-3)">

                <label>8. Content reveals clear meaning & thought-provoking:</label>
                <input type="text" name="clearMeaning" placeholder="Enter a score (0-3)">

                <label>9. Content is focused on the main idea and no diversions, no irrelevant content:</label>
                <input type="text" name="focusedContent" placeholder="Enter a score (0-3)">

                <label>10. Definitions explained well with suitable examples:</label>
                <input type="text" name="definitionsExplained" placeholder="Enter a score (0-3)">

                <label>11. There are multiple perspectives and balanced viewpoints on issues:</label>
                <input type="text" name="balancedViewpoints" placeholder="Enter a score (0-3)">

                <label>12. There is no bias in content, such as over-generalization and stereotyping:</label>
                <input type="text" name="noBiasContent" placeholder="Enter a score (0-3)">

                <label>13. The content and illustrations do not carry any form of discrimination on the grounds of gender, age, race, religion, culture, disability, etc.:</label>
                <input type="text" name="noDiscrimination" placeholder="Enter a score (0-3)">

                <label>14. Included appropriate resources for further reading:</label>
                <input type="text" name="resourcesForReading" placeholder="Enter a score (0-3)">

                <label>15. Bibliography, References & Citations (0-5):</label>
                <input type="text" name="bibliographyCitations" placeholder="Enter a score (0-5)">

            </div>
            <button type="button" onclick="toggleSection('language')">
                Language Assessment
                <div class="arrow"></div>
            </button>

            <div id="language" class="hidden">
                <h3>Language Assessment</h3>
                <!-- Language questions -->
                <label>1. Is the language used in the text simple?</label>
                <input type="text" name="languageSimplicity" placeholder="0-3 score">

                <label>2. Usage of Standard Technical Terminology</label>
                <input type="text" name="standardTerminology" placeholder="0-3 score">

                <label>3. Usage of Standard Punctuation Marks & Symbols</label>
                <input type="text" name="punctuationMarks" placeholder="0-3 score">

                <label>4. The language is accurate and precise</label>
                <input type="text" name="languageAccuracy" placeholder="0-3 score">

                <label>5. Can the audience determine meanings of difficult or technical terms through context clues?</label>
                <input type="text" name="contextClues" placeholder="0-3 score">

                <label>6. Is the text free from Grammatical mistakes, redundancies, wordiness, highfalutin and sexist language?</label>
                <input type="text" name="grammaticalMistakes" placeholder="0-3 score">

                <label>7. Is the text free from fragments, run-on, and overly complex sentences?</label>
                <input type="text" name="sentenceStructure" placeholder="0-3 score">

                <label>8. Are capitalization, spelling, and paragraphs used correctly?</label>
                <input type="text" name="capitalizationAndSpelling" placeholder="0-3 score">
            </div>
            <!-- Section G: Illustrations -->
            <button type="button" onclick="toggleSection('illustrations')">
                Illustrations
                <div class="arrow"></div>
            </button>

            <div id="illustrations" class="hidden">
                <h3>Illustrations</h3>
                <label>1. Colour:</label>
                <input type="text" name="colour" placeholder="Score (0-10)">

                <label>2. Visibility of illustrations:</label>
                <label>Clarity/Resolution:</label>
                <input type="text" name="clarityResolution" placeholder="Score (0-5)">

                <label>Colour:</label>
                <input type="text" name="visibilityColor" placeholder="Score (0-5)">

                <label>Labelling:</label>
                <input type="text" name="labelling" placeholder="Score (0-5)">

                <label>3. Relevance to the content:</label>
                <input type="text" name="relevanceToContent" placeholder="Score (0-3)">
            </div>
            <button type="button" onclick="toggleSection('ethicalIssues')">
                EthicalIssues
                <div class="arrow"></div>
            </button>
            <div id="ethicalIssues" class="hidden">
                <h3>Ethical Issues</h3>
                <label>1. Fabrication & falsification of data:</label>
                <input type="radio" name="dataFabrication" value="Yes"> Yes
                <input type="radio" name="dataFabrication" value="No"> No
                <br>

                <label>2. Plagiarism:</label>
                <input type="radio" name="plagiarism" value="Yes"> Yes
                <input type="radio" name="plagiarism" value="No"> No
                <br>

                <label>3. Citation bias:</label>
                <input type="radio" name="citationBias" value="Yes"> Yes
                <input type="radio" name="citationBias" value="No"> No
                <br>
            </div>





            <h3>Submit</h3>
            <button type="submit">Submit Assessment</button>
        </form>
    </div>
</body>

</html>