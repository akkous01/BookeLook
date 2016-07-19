-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 16 Ιουλ 2016 στις 18:04:18
-- Έκδοση διακομιστή: 10.1.13-MariaDB
-- Έκδοση PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `zoominbooks`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(6) COLLATE utf8_bin NOT NULL,
  `password` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `announcement_content` varchar(1000) COLLATE utf8_bin NOT NULL,
  `announcement_date` date NOT NULL,
  `announcement_photo` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `announcement_content`, `announcement_date`, `announcement_photo`) VALUES
(1, 'Στην πληροφορική, απλό κείμενο (plain text) είναι τα περιεχόμενα ενός', '2016-07-16', 'aa.png'),
(2, 'Στην πληροφορική, απλό κείμενο (plain text) είναι τα περιεχόμενα ενός απλού σειριακού (sequential) αρχείου όταν διαβάζονται σαν κείμενο, χωρίς να είναι αναγκαία επεξεργασία για την εμφάνισή του, σε αντίθεση με το κείμενο με μορφοποίηση (formatted text).', '2016-07-16', ''),
(3, 'Στην πληροφορική, απλό κείμενο (plain text) είναι τα περιεχόμενα ενός απλού σειριακού (sequential) αρχείου όταν διαβάζονται σαν κείμενο', '2016-07-16', 'antria.kkousii.1.png');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(100) COLLATE utf8_bin NOT NULL,
  `blog_content` mediumtext COLLATE utf8_bin NOT NULL,
  `blog_date` date NOT NULL,
  `blog_photo` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_content`, `blog_date`, `blog_photo`) VALUES
(1, 'Απλό κείμενο', 'Στην πληροφορική, απλό κείμενο (plain text) είναι τα περιεχόμενα ενός απλού σειριακού (sequential) αρχείου όταν διαβάζονται σαν κείμενο, χωρίς να είναι αναγκαία επεξεργασία για την εμφάνισή του, σε αντίθεση με το κείμενο με μορφοποίηση (formatted text).\r\n\r\nΗ κωδικοποίηση συνήθως είναι ASCII, κάποια από τα παράγωγά της, όπως το ISO/IEC 646 κλπ., ή κάποιες φορές το EBCDIC.', '2016-07-16', 'antria.kkousii.1.png'),
(2, 'Απλό κείμενο', 'Ο σκοπός της χρήσης απλού κειμένου σήμερα είναι σαν ένας &quot;ελάχιστος κοινός παρονομαστής&quot; που εξασφαλίζει ανεξαρτησία από προγράμματα που απαιτούν τη δική τους ειδική κωδικοποίηση ή μορφοποίηση (με αποτέλεσμα περιορισμούς). Τα αρχεία απλού κειμένου μπορούν να ανοιχτούν, να διαβαστούν και να τροποποιηθούν από τους περισσότερους διορθωτές κειμένου. Παραδείγματα τέτοιων διορθωτών είναι το Σημειωματάριο (στα Windows), το edit (στο DOS), ο ed, ο emacs, ο vi, ο vim, ο Gedit ή ο nano (στο Linux και σε άλλα συστήματα τύπου Unix), το SimpleText (στο Mac OS), ή το TextEdit (στο Mac OS X). Άλλα προγράμματα μπορούν επίσης να διαβάζουν απλό κείμενο. Το απλό κείμενο μπορεί επίσης να χρησιμοποιηθεί από απλά υπολογιστικά εργαλεία όπως οι εντολές εμφάνισης γραμμών κειμένου type (DOS και Windows) και cat (Unix), αλλά και από πιο πολύπλοκα προγράμματα, όπως οι φυλλομετρητές Ιστού Lynx και Line Mode Browser.', '2016-07-16', ''),
(3, 'Κωδικοποίηση', 'ρχικά το κείμενο συχνά κωδικοποιούνταν σε ASCII, χρησιμοποιώντας 8 bits για ένα γράμμα ή άλλο χαρακτήρα, κωδικοποιώντας τα 7 bits ώστε να επιτρέπει 128 τιμές, και χρησιμοποιώντας το 8ο σαν bit αθροίσματος ελέγχου (checksum) κατά τη μεταφορά ενός αρχείου. Αυτό επέτρεπε το απλό λατινικό αλφάβητο, κωδικούς ελέγχου, παρενθέσεις και σημεία στίξης.\r\n\r\nΌταν τα δεδομένα που μεταφέρονταν απέκτησαν πιο σταθερή μορφή, το 8ο bit σταμάτησε να χρησιμοποιείται σαν άθροισμα ελέγχου και χρησιμοποιήθηκε για την επέκταση του συνόλου των χαρακτήρων κατά άλλους 128 χαρακτήρες. Αυτοί οι μη-πρότυποι χαρακτήρες κωδικοποιούνταν με διαφορετικό τρόπο σε κάθε χώρα, κατά τρόπο που έκανε αδύνατη την κωδικοποίηση πολυγλωσσικών κειμένων. Για παράδειγμα, ένας φυλλομετρητής', '2016-07-16', 'aa.png');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `books`
--

CREATE TABLE `books` (
  `Book_id` int(11) NOT NULL,
  `ISBN` varchar(60) COLLATE utf8_bin NOT NULL,
  `Title` varchar(70) COLLATE utf8_bin NOT NULL,
  `Writer` varchar(50) COLLATE utf8_bin NOT NULL,
  `Illustrator` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Publisher` varchar(50) COLLATE utf8_bin NOT NULL,
  `Pages` int(4) NOT NULL,
  `Persentage_of_images` float NOT NULL,
  `Min_age_no_read` int(2) NOT NULL,
  `Min_age_read` int(2) NOT NULL,
  `For_parents` bit(1) NOT NULL,
  `Cover` varchar(100) COLLATE utf8_bin NOT NULL,
  `Back_cover` varchar(100) COLLATE utf8_bin NOT NULL,
  `Link` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `Price` float NOT NULL,
  `Hard_copy` bit(1) NOT NULL,
  `E_book` bit(1) NOT NULL,
  `Audio_book` bit(1) NOT NULL,
  `Curriculum` varchar(1000) COLLATE utf8_bin NOT NULL,
  `Show_to_user` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `books`
--

INSERT INTO `books` (`Book_id`, `ISBN`, `Title`, `Writer`, `Illustrator`, `Publisher`, `Pages`, `Persentage_of_images`, `Min_age_no_read`, `Min_age_read`, `For_parents`, `Cover`, `Back_cover`, `Link`, `Price`, `Hard_copy`, `E_book`, `Audio_book`, `Curriculum`, `Show_to_user`) VALUES
(10, '960-412-064-6', 'Ένας πολύ γλυκός… λύκος', 'Λήδα Βαρβαρούση', 'Λήδα Βαρβαρούση', 'ΠΑΠΑΔΟΠΟΥΛΟΣ', 22, 30, 4, 6, b'0', 'likos.cover.jpg', '', 'vfsd', 8, b'1', b'0', b'0', 'Notice the WHERE clause in the DELETE syntax: The WHERE clause specifies which record or records that should be deleted. If you omit the WHERE clause, all records will be deleted!', b'1'),
(11, '960-423-424-2', 'Η Μίλι, η Μόλι και η πρώτη τους μέρα στο σχολείο', 'Gill Pittar', 'Cris Morrell', 'Σαββάλας Milly Molly Books', 31, 15, 3, 5, b'0', 'moli.cover.jpg', 'moli.back.jpg', '', 7, b'1', b'0', b'0', '', b'1'),
(12, '978-960-501-904-4', 'Το ποντικάκι που ήθελε να αγγίξει ένα αστεράκι', 'Ευγένιος Τριβιζάς', 'Stephen West', 'ΜΕΤΑΙΧΜΙΟ', 40, 30, 4, 6, b'0', 'pontiki.cover.jpg', 'pontiki.back.jpg', '', 14, b'1', b'0', b'0', '', b'1'),
(13, '960-397-802-7', 'Eίμαι ξεχωριστή…', 'Jen Green', 'Mike Gordon', 'ΜΟΝΤΕΡΝΟΙ ΚΑΙΡΟΙ', 29, 25, 4, 6, b'0', 'ksexoristi.cover.jpg', 'ksexoristi.back.jpg', '', 16, b'1', b'0', b'0', '', b'1'),
(14, '978-618-02-0276-2', 'Ο μπαμπάς έχασε τη δουλειά του', 'Τζένιφερ Μουρ-Μαλινός', 'Γκουστάβο Μαζάλι', 'ΜΙΝΩΑΣ', 30, 20, 7, 7, b'0', 'dad.cover.jpg', 'dad.back.jpg', '', 7, b'1', b'0', b'0', '', b'1'),
(15, '960-8365-32-5', 'Το μικρό χωριό στο βουνό', 'Αντώνης Παπαθεοδούλου', 'παιδιά', 'Ταξιδευτής', 24, 30, 3, 5, b'1', 'xorio.cover.jpg', '', '', 12, b'1', b'0', b'0', '', b'1'),
(16, '978-960-16-3496-8', 'Η γιαγιά, το παιδί και ο κιθαρίστας Φουμ, φουμ, φουμ! Αν ο μικρός Χρισ', 'Αντώνης Παπαθεοδούλου', 'Ντανιέλα Σταματιάδη', 'ΠΑΤΑΚΗ', 44, 60, 8, 8, b'0', 'foum.cover.jpg', 'foum.cover.jpg', '', 6, b'1', b'0', b'0', '', b'1'),
(17, '960-219-187-2', 'Η χώρα με τους παράξενους ανθρώπους', 'Νικόλας Ανδρικόπουλος', 'Νικόλας Ανδρικόπουλος', 'ΚΑΛΕΝΤΗΣ', 31, 50, 7, 7, b'0', 'parakseni.cover.jpg', 'parakseni.back.jpg', '', 16, b'1', b'0', b'0', '', b'1'),
(18, '978-960-14-2431-6', 'Το μυστικό της Μαγικής Πυγολαμπίδας', 'Σάντυ Κουτσοσταμάτη', 'Ελένη Τσακμάκη', 'Α.Α ΛΙΒΑΝΗ', 43, 40, 5, 5, b'1', 'mistiko.back.jpg', 'mistiko.cover.jpg', '', 8, b'1', b'0', b'0', 'Σημασία δεν έχει να είμαστε όλοι αδύνατοι, αλλά να έχουμε αυτοεκτίμηση και να βλέπουμε πότε είμαστε πραγματικά ευτυχισμένοι – σε αυτή την περίπτωση όταν τα λαγουδάκια  ήταν με τους φίλους τους.\r\nΥπάρχουν και πολύ χειρότερες καταστάσεις από αυτά που αντιμετωπίζουμε εμείς.', b'1'),
(19, '978-960-453-504-0', 'Ο Βασίλης και οι θυμωμένες ζωγραφιές', 'Χρυσάνθη Τσιαμπαλή Κελεπούρη', 'Χρήστος Δήμος', 'ΨΥΧΟΓΙΟΣ', 46, 70, 7, 7, b'0', 'vasilis.cover.jpg', 'vasilis.back.jpg', '', 8, b'1', b'0', b'0', 'Καλλιέργεια περιβαλλοντικής / οικολογικής συνείδησης μέσα από παραδειγμα που καταλαμβαίνουν τα παιδιά όπως είναι το να μην πετούν κόλλες με ζωγραφιές που δεν θέλουν και απλά να διορθώνουν τα λάθη τους. \r\nΓνώσεις για το πώς φτιάχνεται το χαρτί, διαστάσεις χρήσης του στην ζωή μας, αντίχτυπο στην αποψίλωση των δασών και στην καταστροφή ζωικών βιοτοπων.\r\nΣελ. 42 αναλογία χαρτιού (1000 kg)- δέντρων (17)\r\nΑνακύκλωση όχι μόνο χαρτιού, αλλά και αλουμινίου, πλαστικού, μπαταριών, γυαλιού, ηλεκτρ. Συσκευών, μέχρι και αυτοκινήτων. Πρακτικές συμβουλές π.χ ζωγραφίζω και από τις δύο πλευρές, δύο κάλαθοι για σκοπούς ανακύκλωσης', b'1'),
(20, 'bjk', 'cdjsk', 'jk', 'bnbk', 'bkj', 45, 45, 45, 45, b'0', 'aa.png', '', '', 15, b'1', b'0', b'0', '', b'0'),
(21, 'new', 'new', 'new', 'new', 'new', 1, 1, 1, 1, b'0', 'antria.kkousii.1.png', '', '', 1, b'1', b'0', b'0', '', b'0'),
(22, 'nnn', 'nnn', 'nnn', 'nnn', 'nnn', 4, 4, 4, 4, b'0', 'aa.png', 'no.png', '', 5, b'1', b'0', b'0', '', b'0'),
(23, 'dfgh', 'asdfghj', 'dfghj', 'dfgh', 'dfgh', 1, 1, 1, 1, b'0', 'antria.kkousii.1.png', '', '', 1, b'1', b'0', b'0', 'sdfghj', b'0'),
(24, 'er', 'asdfghj', 'erty', 'erty', 'erty', 1, 1, 1, 1, b'0', 'aa.png', '', 'fvgbhjk', 4, b'1', b'0', b'0', 'erdctfvghujikrdcfvgbhnjk 4v\r\nvfmdokmvkldfmvkldfs\r\n,clsd,c;ls,\r\nvpds,vls\r\nvmdsm', b'1');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `bookshops`
--

CREATE TABLE `bookshops` (
  `Bookshop_id` int(11) NOT NULL,
  `Bookshop_name` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `books_keywords`
--

CREATE TABLE `books_keywords` (
  `Book_id` int(11) NOT NULL,
  `Keyword_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `books_keywords`
--

INSERT INTO `books_keywords` (`Book_id`, `Keyword_id`) VALUES
(10, 18),
(10, 21),
(10, 60),
(10, 96),
(10, 106),
(11, 24),
(11, 27),
(11, 44),
(11, 179),
(12, 7),
(12, 95),
(12, 96),
(12, 98),
(12, 99),
(12, 102),
(12, 133),
(12, 171),
(12, 195),
(13, 22),
(13, 96),
(13, 106),
(13, 187),
(13, 197),
(14, 39),
(14, 56),
(14, 92),
(14, 98),
(14, 99),
(14, 197),
(15, 22),
(15, 82),
(15, 85),
(15, 140),
(15, 141),
(15, 142),
(15, 143),
(15, 144),
(15, 145),
(15, 179),
(16, 4),
(16, 82),
(16, 92),
(16, 96),
(16, 133),
(16, 171),
(16, 177),
(16, 178),
(16, 182),
(16, 195),
(17, 24),
(17, 98),
(17, 99),
(17, 112),
(17, 113),
(17, 190),
(18, 16),
(18, 42),
(18, 125),
(18, 126),
(19, 48),
(19, 49),
(19, 82),
(19, 96),
(19, 99),
(19, 106),
(19, 186),
(19, 196),
(20, 23),
(20, 24),
(20, 25),
(20, 26),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(23, 6),
(23, 8),
(23, 12),
(24, 4),
(24, 8),
(24, 9),
(24, 10),
(24, 24),
(24, 67),
(24, 106),
(24, 157),
(24, 196),
(24, 202);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `books_keywords_meaning`
--

CREATE TABLE `books_keywords_meaning` (
  `Meaning_id` int(11) NOT NULL,
  `Book_id` int(11) NOT NULL,
  `Keyword_id` int(11) NOT NULL,
  `Meaning_content` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `books_keywords_meaning`
--

INSERT INTO `books_keywords_meaning` (`Meaning_id`, `Book_id`, `Keyword_id`, `Meaning_content`) VALUES
(20, 20, 23, 'bgf'),
(21, 20, 24, 'grgrtgr'),
(22, 20, 26, 'bgbgbg'),
(32, 21, 1, 'new'),
(33, 21, 2, 'dff'),
(34, 21, 3, 'new'),
(38, 23, 6, 'gvfds'),
(39, 23, 8, 'neew'),
(40, 23, 12, 'gvfc'),
(49, 24, 8, 'hgfd'),
(50, 24, 9, 'kmujyhtgrf'),
(51, 24, 10, 'cffcfcf');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE `categories` (
  `Category_id` int(11) NOT NULL,
  `Name_of_category` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`Category_id`, `Name_of_category`) VALUES
(1, 'Ηθικά/ Πνευματικά μηνυματα'),
(2, 'Ανάλυση-κατανόηση και παραγωγή γραπτού λόγου / Σκέφτομαι και Γράφω '),
(3, 'Γραμματική – Σύνταξη – Λεξιλόγιο'),
(4, 'Σύνδεση με διάφορα άλλα θέματα'),
(5, 'Επιπλέον χαρακτηριστικά');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `keywords`
--

CREATE TABLE `keywords` (
  `Keyword_id` int(11) NOT NULL,
  `Name_of_keyword` varchar(150) COLLATE utf8_bin NOT NULL,
  `Subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `keywords`
--

INSERT INTO `keywords` (`Keyword_id`, `Name_of_keyword`, `Subcategory_id`) VALUES
(1, 'Ο επιμένων νικά', 1),
(2, 'Ο τολμών νικά', 1),
(3, 'Υπομονή – καρτερικότητα ως αρετές', 1),
(4, 'Αγάπη', 1),
(5, 'Συγνώμη - Συγχώρεση', 1),
(6, 'Εκτίμηση', 1),
(7, 'Στοχοπροσήλωση', 1),
(8, 'Αισιοδοξία', 1),
(9, 'Θεώρηση μειονεκτήματος ως πλεονέκτημα', 1),
(10, 'Σκληρή δουλειά Vs τεμπελιά', 1),
(11, 'Σημασία ασφάλειας – προετοιμασίας για παν ενδεχόμενο – καχυποψία -εμπιστοσύνη', 1),
(12, 'Όνειρα', 1),
(13, 'Λύση προβλήματος', 1),
(14, 'Συνέπειες των πράξεων μας', 1),
(15, 'Νίκη, ήττα. Δεν χρειάζεται να νικήσεις για να απολαύσεις το παιχνίδι', 1),
(16, 'Αποδοχή και ενδυνάμωση εαυτού- αυτοεικόνα, αυτοεκτίμηση, αυτοπεποίθηση', 1),
(17, 'Αντιμετώπιση φόβων', 1),
(18, 'Αγάπη στα Βιβλία, γνώση = δύναμη, αποτροπή χειραγώγησης από άλλους', 1),
(19, 'Η δύναμη του εξυπνότερου υπερτερεί της σωματικής δύναμης', 1),
(20, 'Βιαστικά συμπεράσματα μπορεί να οδηγήσουν σε προκαταλήψεις', 1),
(21, 'Ανατροπή στερεοτύπων - προκαταλήψεων', 1),
(22, 'ΑΜΕΑ – Άτομα με ειδικές ανάγκες – Ενιαία Εκπαίδευση', 2),
(23, 'Ιδιαίτερο χαρακτηριστικό – εξωτερική εμφάνιση', 2),
(24, 'Xώρα καταγωγής - ρατσισμό, Ξενοφοβία – ξενοφιλία', 2),
(25, 'Kοινωνική τάξη', 2),
(26, 'Δεξιότητες', 2),
(27, 'Πρώτη μέρα στο σχολείο', 3),
(28, 'Ψείρες – κόψιμο μαλλιών', 3),
(29, 'Σχολικός εκφοβισμός – Bullying, Θύμα, Θύτης ', 3),
(32, 'Αποφυγή καυγά', 3),
(33, 'Έννοια οικογένειας και διαφοροποίηση του θεσμού στη σημερινή εποχή', 6),
(34, 'Σχέση παιδιού με γονείς', 6),
(35, 'Νέο μωρό -Εγκυμοσύνη', 6),
(36, 'Αδερφική αγάπη -ζήλια', 6),
(37, 'Ορφάνια', 6),
(38, 'Παππούς-γιαγιά', 6),
(39, 'Ανεργία στην οικογένεια', 6),
(40, 'Έρωτας', 6),
(41, 'Ρωτούμε πάντα ποιος είναι στην πόρτα', 6),
(42, 'Φαγητό – Διατροφή- Παχυσαρκία', 6),
(43, 'Τηλεόραση', 6),
(44, 'Σχέση με τα ζώα', 6),
(45, 'Αποχωρισμός – θάνατος', 6),
(46, 'Αστυφιλία', 7),
(47, 'Φύση- δέντρα', 7),
(48, 'Περιβαλλοντική-οικολογική συνείδηση', 7),
(49, 'Ανακύκλωση', 7),
(50, 'Εναλλακτικές – ανανεώσιμες πηγές ενέργειας', 7),
(51, 'Η ειρήνη νικά τον πόλεμο – αντιπολεμικό', 7),
(52, 'Εξουσία', 7),
(53, 'Νόμοι', 7),
(54, 'Αντίδραση στην Καταπίεση - πώς λέμε όχι', 1),
(55, 'Προπαγάνδα ΜΜΕ', 7),
(56, 'Αφθονία –Καταναλωτισμός και αλλαγή συνηθειών', 7),
(57, 'Τεχνολογία', 7),
(58, 'Ημερολόγιο', 8),
(59, 'Ερωτηματολόγιο -κουίζ', 8),
(60, 'Ρίμες – ομοιοκαταληξία -ποίημα', 8),
(61, 'Επιστολή/γράμμα- επίσημη-ανεπίσημη', 8),
(62, 'Γλωσσοδέτες', 8),
(63, 'Γρίφοι – στοιχεία', 8),
(64, 'Πινακίδες', 8),
(65, 'Παροιμίες', 8),
(66, 'Αγγελίες', 8),
(67, 'Διαφημίσεις', 8),
(68, 'Βιογραφικό σημείωμα', 8),
(69, 'Άρθρο – εφημερίδα', 8),
(70, 'Συνταγή', 8),
(71, 'Θεατρικό έργο', 8),
(72, 'Επιχειρηματολογικό ', 8),
(73, 'Γραφική νουβέλα (graphic novel)', 8),
(74, 'Μελέτη περίπτωσης (Case study)', 8),
(75, 'Μεγάλα γράμματα', 10),
(76, 'Ανθρωπομορφισμός – ανθρωποποίηση - προσωποποίηση', 11),
(77, 'Χιούμορ', 11),
(78, 'Επίθετα', 11),
(79, 'Επιρρήματα', 11),
(80, 'Λογοτεχνικό ύφος', 11),
(81, 'Λεπτομερείς περιγραφές - Σχηματισμός νοερών εικόνων που καλύπτουν τις  αισθήσεις', 11),
(82, 'Αφήγηση', 11),
(83, 'Ειρωνεία', 11),
(84, 'Αναβολή', 11),
(85, 'Υπερβολή', 11),
(86, 'Υπερφυσικό στοιχείο', 11),
(87, 'Φαντασία', 11),
(88, 'Ρίμες- ομοιοκαταληξία ποίημα', 12),
(89, 'Βοηθητικό για διδασκαλία παραγράφου', 12),
(90, 'Δομικά στοιχεία ενός κειμένου (χώρος, χρόνος, πρόσωπα…)', 12),
(91, 'Μονόλογος', 12),
(92, 'Διάλογος', 12),
(93, 'Κυριολεξία – μεταφορά – κυριολεξοποίηση της μεταφοράς', 11),
(94, 'Επανάληψη', 12),
(95, 'Μοτίβο', 12),
(96, 'Ενεστώτας', 13),
(98, 'Παρατατικός', 13),
(99, 'Αόριστος', 13),
(100, 'Υπερσυντέλικος', 13),
(102, 'Στιγμιαίος/Συνοπτικός Μέλλοντας', 13),
(103, 'Εξακολουθητικός Μέλλοντας', 13),
(104, 'Συντελεσμένος Μέλλοντας', 13),
(105, 'ενικός-πληθυντικός', 14),
(106, 'ορθογραφία καταλήξεων', 15),
(107, 'Προστακτική', 18),
(108, 'Υποτακτική', 18),
(109, 'Ενεργητική – Παθητική φωνή', 18),
(110, 'Ρήματα σε: -ίζω ', 19),
(111, 'Προσωπικές αντωνυμίες', 19),
(112, 'Επίθετα – αριθμητικά', 19),
(113, 'Επιρρήματα', 19),
(114, 'Επαγγέλματα', 20),
(115, 'Οχήματα', 20),
(116, 'Χρόνος – εποχές- μήνες', 20),
(117, 'Μέρες εβδομάδας', 20),
(118, 'πολέμου', 20),
(119, 'Τσίρκο', 20),
(120, 'Πειρατές', 20),
(121, 'Εξωγήινοι', 20),
(122, 'Στρατός', 20),
(123, 'Αθλητισμός', 20),
(124, 'Ολυμπιακοί- Παραολυμπιακοί Αγώνες', 20),
(125, 'Παράγωγες λέξεις', 21),
(126, 'Σύνθετες λέξεις', 21),
(127, 'Ανάλυση λέξης', 21),
(128, 'Ηχητικές λέξεις – λέξεις που παραπέμπουν σε ήχους', 21),
(129, 'Υποκοριστικά', 21),
(130, 'Προθέματα', 21),
(131, 'Παραλλαγές λέξεων- αυτοσχέδιες λέξεις – επανανακάλυψη γλώσσας', 11),
(132, 'Ελλειπτικές προτάσεις', 22),
(133, 'Υποθετικές προτάσεις', 22),
(134, 'Ρητορικά ερωτήματα', 22),
(135, 'Ασύνδετο σχήμα', 22),
(136, 'Ευθύς – πλάγιος λόγος', 22),
(137, 'Αναλογίες', 23),
(138, 'Γεωμετρία', 23),
(139, 'Αριθμητική', 23),
(140, 'Χαρά -ευτυχία', 24),
(141, 'Λύπη', 24),
(142, 'Φόβο – τρόμο', 24),
(143, 'Μοναξιά', 24),
(144, 'Απογοήτευση', 24),
(145, 'Σκίτσο', 25),
(146, 'Συνδυασμός μέσων', 25),
(147, 'Ένταξη γραπτού κειμένου', 25),
(148, 'Γραμματοσειρά', 25),
(149, 'Χρήση μεταφοράς και στις εικόνες', 25),
(150, 'Χτίσιμο σπιτιών από διαφορετικά υλικά', 38),
(151, 'Πείραμα για ανανεώσιμες πηγές ενέργειας', 26),
(152, 'Επιστημονική μέθοδος για μελέτη ενός άγνωστου αντικειμένου', 26),
(153, 'Μετατροπή κάμπιας σε πεταλούδα', 26),
(154, 'Περιστροφή- περιφορά γης- εποχές-μέρα νύχτα', 26),
(155, 'Πλανήτες', 26),
(156, 'Σημεία του ορίζοντα', 27),
(157, 'Καιρικά φαινόμενα', 27),
(158, 'Χάρτης', 27),
(159, 'Περιοχές στην Ελλάδα', 27),
(160, 'Ευρωπαϊκές χώρες', 27),
(161, 'Ελληνικός πολιτισμός', 27),
(162, 'Βραζιλία', 27),
(163, 'Νιγηρία', 27),
(164, 'Αγγλία', 27),
(165, 'Ταζμανία', 27),
(166, 'φακίριδες', 27),
(167, 'Διάκριση αιτίας με αφορμή', 28),
(168, 'Αναφορά στον Μ. Αλέξανδρο', 28),
(169, 'Αναφορά στον Πήγασο', 29),
(171, 'Χριστούγεννα', 30),
(172, '28η Οκτωβρίου ', 30),
(173, 'Υγιεινή δοντιών', 31),
(174, 'Θρεπτικά συστατικά', 31),
(175, 'Εκλογές', 32),
(176, 'Να ρωτούμε πάντα και την άλλη πλευρά', 1),
(177, 'Εμπάθεια – ενσυναίσθηση', 1),
(178, 'Φιλανθρωπία', 1),
(179, 'Φιλία χωρίς εγωισμό', 3),
(180, 'Αντίδραση στην καταπίεση ', 7),
(181, 'Ανεργία', 7),
(182, 'Διασκευή – παραλλαγή διαφορετική εκδοχή παραμυθιού / ιστορίας', 9),
(183, 'Πολυτροπικότητα – για άτομα που μαθαίνουν ελληνικά, που ξεκινούν ή δυσκολεύονται στην ανάγνωση.', 10),
(184, 'Επιχειρηματολογία', 11),
(185, 'Παρακείμενος', 13),
(186, 'Περιβάλλον- Οικολογία', 20),
(187, 'Χρονικές προτάσεις', 22),
(188, 'Κύπρος', 27),
(189, 'Βραβεία - Έπαινοι', 51),
(190, 'Φιλανθρωπικό έργο', 51),
(191, 'Περιβαλλοντικό έργο', 51),
(192, '+ cd', 51),
(193, 'Εικόνες Pop-up', 51),
(194, 'Λειτουργία άγγιξε και νιώσε', 51),
(195, '+ασκήσεις για τα παιδιά', 53),
(196, '+ δραστηριότητες για τα παιδιά', 53),
(197, '+ συμβουλές για τους γονείς', 52),
(198, '+ πηγές για επιπρόσθετες πληροφορίες', 51),
(199, 'Συμπλήρωση συνέχειας ιστορίας/ τέλους από το παιδί/ αναγνώστη', 51),
(200, 'εγώ', 15),
(201, 'εσύ', 15),
(202, 'αυτός/αυτή', 15),
(203, 'εμείς', 15),
(204, 'εσείς', 15),
(205, 'αυτοί', 15),
(206, 'Φίλος', 5);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `not_found_keywords`
--

CREATE TABLE `not_found_keywords` (
  `Not_found_keyword_id` int(11) NOT NULL,
  `Not_found_keyword` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `not_found_keywords`
--

INSERT INTO `not_found_keywords` (`Not_found_keyword_id`, `Not_found_keyword`) VALUES
(1, 'Πρώτη Λέξη'),
(2, 'Δεύτερη Λέξη');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `stores`
--

CREATE TABLE `stores` (
  `Store_id` int(11) NOT NULL,
  `Bookshop_id` int(11) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `store_books`
--

CREATE TABLE `store_books` (
  `Store_id` int(11) NOT NULL,
  `Book_id` int(11) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `subcategories`
--

CREATE TABLE `subcategories` (
  `Subcategory_id` int(11) NOT NULL,
  `Name_of_subcategory` varchar(150) COLLATE utf8_bin NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `subcategories`
--

INSERT INTO `subcategories` (`Subcategory_id`, `Name_of_subcategory`, `Category_id`) VALUES
(1, 'Ευθύνη εαυτού', 1),
(2, 'Διαφορετικότητα όσον αφορά', 1),
(3, 'Σχολείο', 1),
(5, 'Φιλία', 1),
(6, 'Οικογένεια', 1),
(7, 'Κοινωνία περιβάλλον και σύγχρονα θέματα', 1),
(8, 'Κειμενικά είδη', 2),
(9, 'Παραλλαγή παραμυθιού ', 2),
(10, 'Πολυτροπικότητα ', 2),
(11, 'Λογοτεχνικά είδη και φαινόμενα', 2),
(12, 'Δομή Κειμένου', 2),
(13, 'Χρόνοι', 3),
(14, 'Αριθμός', 3),
(15, 'Πρόσωπα (εγώ, εσύ, αυτός, εμείς, εσείς, αυτοί)', 3),
(16, 'Σημεία στίξης', 3),
(17, 'Σημασία τονισμού', 3),
(18, 'Εγκλίσεις', 3),
(19, 'Μέρη του Λόγου', 3),
(20, 'Λεξιλόγιο – έννοιες', 3),
(21, 'Δομή Λέξης', 3),
(22, 'Δομή Πρότασης', 3),
(23, 'Μαθηματικά', 4),
(24, 'Συναισθηματική αγωγή', 4),
(25, 'Σχεδιασμός/ design – Τέχνη', 4),
(26, 'Επιστήμη/ φυσική', 4),
(27, 'Γεωγραφία – Κουλτούρα- Πολιτισμός', 4),
(28, 'Ιστορία', 4),
(29, 'Μυθολογία', 4),
(30, 'Εορταστικές περίοδοι – Θρησκευτικά/ πίστη', 4),
(31, 'Αγωγή Ζωής – Οικιακή Οικονομία', 4),
(32, 'Πολιτική αγωγή', 4),
(33, 'Μουσική', 4),
(37, 'Ενεργητική – Παθητική φωνή', 3),
(38, 'Δεξιότητες ζωής', 4),
(39, 'Αρχέτυπο – κανόνας των τριών', 4),
(51, 'Βιβλίου', 5),
(52, 'Για γονείς', 5),
(53, 'Για παιδιά', 5);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Ευρετήρια για πίνακα `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Ευρετήρια για πίνακα `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Ευρετήρια για πίνακα `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_id`);

--
-- Ευρετήρια για πίνακα `bookshops`
--
ALTER TABLE `bookshops`
  ADD PRIMARY KEY (`Bookshop_id`);

--
-- Ευρετήρια για πίνακα `books_keywords`
--
ALTER TABLE `books_keywords`
  ADD PRIMARY KEY (`Book_id`,`Keyword_id`),
  ADD KEY `Keyword_id` (`Keyword_id`);

--
-- Ευρετήρια για πίνακα `books_keywords_meaning`
--
ALTER TABLE `books_keywords_meaning`
  ADD PRIMARY KEY (`Meaning_id`),
  ADD KEY `Book_id` (`Book_id`),
  ADD KEY `Keyword_id` (`Keyword_id`);

--
-- Ευρετήρια για πίνακα `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Ευρετήρια για πίνακα `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`Keyword_id`),
  ADD KEY `Subcategory_id` (`Subcategory_id`);

--
-- Ευρετήρια για πίνακα `not_found_keywords`
--
ALTER TABLE `not_found_keywords`
  ADD PRIMARY KEY (`Not_found_keyword_id`);

--
-- Ευρετήρια για πίνακα `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`Store_id`);

--
-- Ευρετήρια για πίνακα `store_books`
--
ALTER TABLE `store_books`
  ADD PRIMARY KEY (`Store_id`,`Book_id`),
  ADD KEY `Book_id` (`Book_id`);

--
-- Ευρετήρια για πίνακα `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`Subcategory_id`),
  ADD KEY `Category_id` (`Category_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT για πίνακα `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT για πίνακα `books`
--
ALTER TABLE `books`
  MODIFY `Book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT για πίνακα `bookshops`
--
ALTER TABLE `bookshops`
  MODIFY `Bookshop_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `books_keywords_meaning`
--
ALTER TABLE `books_keywords_meaning`
  MODIFY `Meaning_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT για πίνακα `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT για πίνακα `keywords`
--
ALTER TABLE `keywords`
  MODIFY `Keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT για πίνακα `not_found_keywords`
--
ALTER TABLE `not_found_keywords`
  MODIFY `Not_found_keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT για πίνακα `stores`
--
ALTER TABLE `stores`
  MODIFY `Store_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `Subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `books_keywords`
--
ALTER TABLE `books_keywords`
  ADD CONSTRAINT `books_keywords_ibfk_1` FOREIGN KEY (`Book_id`) REFERENCES `books` (`Book_id`),
  ADD CONSTRAINT `books_keywords_ibfk_2` FOREIGN KEY (`Keyword_id`) REFERENCES `keywords` (`Keyword_id`);

--
-- Περιορισμοί για πίνακα `books_keywords_meaning`
--
ALTER TABLE `books_keywords_meaning`
  ADD CONSTRAINT `books_keywords_meaning_ibfk_1` FOREIGN KEY (`Book_id`) REFERENCES `books_keywords` (`Book_id`);

--
-- Περιορισμοί για πίνακα `keywords`
--
ALTER TABLE `keywords`
  ADD CONSTRAINT `keywords_ibfk_1` FOREIGN KEY (`Subcategory_id`) REFERENCES `subcategories` (`Subcategory_id`);

--
-- Περιορισμοί για πίνακα `store_books`
--
ALTER TABLE `store_books`
  ADD CONSTRAINT `store_books_ibfk_1` FOREIGN KEY (`Book_id`) REFERENCES `books` (`Book_id`),
  ADD CONSTRAINT `store_books_ibfk_2` FOREIGN KEY (`Store_id`) REFERENCES `stores` (`Store_id`);

--
-- Περιορισμοί για πίνακα `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `categories` (`Category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
