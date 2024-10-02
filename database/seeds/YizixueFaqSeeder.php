<?php

use App\YizixueFaq;
use App\YizixueFaqCategory;
use Illuminate\Database\Seeder;

class YizixueFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        YizixueFaqCategory::query()->truncate();
        foreach (['會員', '學長姐', '個人品牌', '交易安全'] as $category) {
            YizixueFaqCategory::create(['name' => $category]);
        }

        $data = [
            ['yizixue_faq_id' => 1, 'title' => '免費加入一般會員對我有哪些好處？', 'content' => '除了瀏覽易子學的內容外，更重要的是可以在「諮詢｜問與答」區域提問，獲得學長姐的一對一直接回覆。透過與學長姐的互動，您可以評估他們的特質是否適合您的需求。隨後，您可以與一名或多名學長姐協商諮詢內容、時間、方式、付費條件等。在易子學平台上，會員和學長姐直接進行溝通，易子學不會對內容進行額外收費，確保諮詢交易的支付是雙方共議且直接進行的。'],
            ['yizixue_faq_id' => 1, 'title' => '我該如何尋找適合我的優秀學長姐來協助我進行留學諮詢？', 'content' => '學長姐的選擇取決於會員個人的留學準備情況以及對於海外留學目標的理解程度。我們建議您在使用易子學瀏覽的同時，檢視自己目前的學習進度，例如學業成績、GPA、語言水平以及相關標準測驗成績等。隨後，您可以提出自己當下遇到的具體問題。學長姊們都曾經走過相同的道路，因此能夠清楚了解您所需要而給予建議。'],
            ['yizixue_faq_id' => 1, 'title' => '我目前還在評估海外留學但對此一無所知。我應該如何尋求諮詢？', 'content' => '請放心，您可以透過「諮詢｜問與答」功能提出您的現況。每位學長姐在決定海外留學之前都經歷過與您相同的情況。他們憑藉自身的經驗，將幫助您釐清為何要選擇海外留學以及未來2到3年的規劃。您將獲得關於如何做好準備以及如何選擇最適合您的資源來協助學業和課外活動等方面的建議。'],
            ['yizixue_faq_id' => 1, 'title' => '作為一位家長，我可以透過易子學來增進對於海外留學的了解嗎？', 'content' => '當然可以。我建議您的孩子先加入易子學一般會員，同時邀請您和您的孩子一同瀏覽並搜索易子學的內容。您的孩子也可以在「諮詢｜問與答」中提出問題。在這個平台上，我們有來自不同國家、不同學校、不同學科背景的學長姐，他們將會盡快與您聯繫，協助您了解海外留學的利與弊，不同國家和學校之間的差異，以及財務和生活支援等問題。'],
            ['yizixue_faq_id' => 1, 'title' => '我已經有學校和留學機構的顧問諮詢，為什麼還需要易子學？', 'content' => '每所大學和學系都會根據教學目標進行調整，每年的招生取向也會有所調整。只有身處校園一線的學長姐，才能提供第一手情報，幫助會員獲取關鍵資源。此外，由於在校學長姐更能了解明星教授和重要學程，因此可以協助會員打造符合學校需求且獨一無二的申請履歷。傳統的升學顧問和代辦機構無法回答的問題，易子學的學長姐可以提供具體的幫助。'],
            ['yizixue_faq_id' => 1, 'title' => '透過易子學，我能找到適合自己的高中國際部或國際學校嗎？', 'content' => '易子學的學長姐們都曾走過這條路，憑藉自己在高中的經驗以及與其他同學的交流，能夠提供您選擇國際學校的建議。特別是在IB/AP/A-level課程的師資和教學品質、選課的多樣性以及評分方式等方面的差異，將直接影響您的學業成績和未來的選校策略。因此，通過與易子學的學長姐多交流，您可以更好地了解高中的實際辦學情況，避免對眼花繚亂的國際學校和國際部感到困惑。'],
            ['yizixue_faq_id' => 1, 'title' => '易子學為何鼓勵所有會員升級為學長姐？', 'content' => '這一個觀念源自易子學的初衷，即透過知識交流實現「知識平權」的目標。我們深信學習不應該是單向的上下關係，每個人都擁有獨特的經驗值得分享。高中生也能根據他們在學校的體驗，包括教學品質、教師素質、同儕特質，升學成績等方面，提供實用且具體的建議，幫助會員避免在網路搜索時受到雜亂信息的干擾。'],
            ['yizixue_faq_id' => 2, 'title' => '成為易子學的付費學長姐，對我有什麼好處？', 'content' => '1. 直接溝通：您可以與會員直接協商諮詢內容、時間、方式以及付款等事項，並在海外求學期間獲得額外收入。易子學平台不會對這些服務產生額外費用或其他折扣。
2. 建立個人品牌：成為學長姐意味著您將成為其他會員尋求建議和指導的重要來源，進而提升您的影響力和聲譽。
3. 專業成長：通過分享您的海外經驗，您可以建立自己的諮詢事業。不論在國內外，易子學支持您在經濟和專業上的持續發展。'],
            ['yizixue_faq_id' => 2, 'title' => '如何確保與會員之間的互動保持良好，並促進付費諮詢的實現？', 'content' => '關鍵在於建立透明、誠信的雙向溝通機制。首先要確保提供準確、實用的建議和資訊，積極在「留學誌｜推薦」發表文章，以及在「問與答｜諮詢」中主動與會員聯繫並即時回應問題。其次要尊重會員的意見和立場，以同理心與他們建立共鳴，進而建立起良好的信任關係，促進付費諮詢的實現。'],
            ['yizixue_faq_id' => 2, 'title' => '會員對於海外留學通常會有哪些類型的問題？', 'content' => '最關注的是大學排名背後無法顯示的學術目標，進而影響教學學程、必選修科目與難易度，以及招生條件。其次是課程安排，會員對於不同國家與學校的課程結構和教學方式不太了解，無法得知是否可以折抵學分，這些是學校和代辦機構無法提供的信息。最後是如何評估課程是否適合並能順利畢業，生活與經濟支持，這包括台灣同學會的運作、如何參與社團活動、如何掌握生活開支以避免不必要的費用增加學習和生活成本。'],
            ['yizixue_faq_id' => 2, 'title' => '如何打造個人品牌，拓展自己的留學諮詢事業？', 'content' => '首先，要充分發揮自身的學經歷優勢，深入瞭解學校的各種信息和流程，特別是教學目標與招生條件的變化情況。其次，要提供準確、實用的建議，以解決會員的問題。第三，要定期回母校交流，善用易子學平台的優勢，並結合社群媒體來宣傳自己，積極擴展與其他會員、留學機構的良好關係，以提升自己的影響力。'],
            ['yizixue_faq_id' => 2, 'title' => '我並非來自頂尖大學，是否有資格成為易子學的學長姐？', 'content' => '台灣的海外留學市場每年吸引了超過十萬人的關注，這是一個持續成長的市場。儘管頂尖學府的學生往往受到青睞，但是每個準備海外留學的學生的成績、特質、課外活動、家庭背景等都大不相同，很難單純依靠全球大學排名表來解決不同朋友的個別問題。因此，在易子學，我們格外重視平台上每一位學長姐的多元性；我們相信多元的知識與體驗，更能滿足微型分眾的市場需求，提供給廣大會員更明確直接的具體諮詢。'],
            ['yizixue_faq_id' => 2, 'title' => '如何能夠針對準備讓孩子海外留學的家長，分憂解勞呢？', 'content' => '要主動與家長保持溝通，傾聽他們對孩子海外留學的擔憂和問題，特別是關於校園治安、學校評價以及財物支持等方面的問題。接著，根據家長的提問，提供準確實用的資訊，包括線上諮詢、校園導覽、留學條件、學校資訊、生活環境，以及台灣社團的協助與支援等。再者，善用自身與其他朋友的協助，提供機場接駁、宿舍入住、銀行開戶、生活採買、餐飲安排、手機開通，等生活安排。'],
            ['yizixue_faq_id' => 2, 'title' => '我已經畢業了，是否還有機會在易子學擔任學長姐的角色？', 'content' => '當然，我們非常歡迎您！易子學一直強調平台上每位學長姐的多元性，相信透過知識交流可以促進「知識平權」的實現。恭喜您已經畢業了！除了過去的學習經驗和人脈分享外，您目前所處的產業與就業狀況、居住與生活所面對的挑戰和解決方式，甚至居留入籍及置產等方面，這些都是其他會員可能會碰到並希望提前了解和安排的事項。'],
            ['yizixue_faq_id' => 3, 'title' => '什麼是個人品牌，對身為學生的我有什麼好處呢？', 'content' => '個人品牌是你在外界的形象和聲譽，是一種獨特的身份和價值主張。對於身為學生的你，建立個人品牌可以幫助你在學術和職業生涯中脫穎而出。其次，個人品牌可以透過提高信任度和專業度，提早開展個人事業。舉例來說，在易子學建立自己的付費諮詢服務，擴大與外部合作的機會。此外，建立個人品牌還可以幫助你建立良好的人際關係，通過留學的經歷擴大你的社交圈子，累積未來職業生涯中的重要資產。'],
            ['yizixue_faq_id' => 3, 'title' => '要如何透過易子學維持個人聲量，並增強個人品牌的價值？', 'content' => '自己可以定期製作並分享有價值的內容，例如在『留學誌』上發表文章、轉載社群媒體上的貼文，主動進行校園直播等，確保內容具有吸引力和專業性。其次，要積極擴展人脈，建立與業界專業人士和意見領袖的關係，透過合作和交流來增強個人品牌的可信度和影響力。同時，要善用台灣同學會對於新鮮人的凝聚力，以團隊的力量一起建構海外留學諮詢事業。最後，要持續學習和成長，要確保個人在不同平台上的形象和訊息一致，塑造一個清晰個人品牌形象。'],
            ['yizixue_faq_id' => 3, 'title' => '塑造個人品牌的過程中，有五項重要的事情需要避免？', 'content' => '1. 虛偽和不真實：不要試圖塑造一個與真實自我不符的形象。保持真實和誠實是建立可信個人品牌的基礎。
2. 忽視反饋和評論：不要忽視他人對你品牌的評價和反饋。這些反饋可以幫助你改進和調整品牌形象。
3. 缺乏一致性：在各種平台和場合上，保持個人品牌形象的一致性是非常重要的。不要讓你的形象出現不一致或混亂的情況。
4. 過度自我宣傳：不要過度宣傳自己，否則可能會讓人感到厭煩或不舒服。要注意在適當的場合和方式下進行宣傳，並且注重給予價值。
5. 忽略個人發展：個人品牌不僅僅是外在形象，也包括個人的內在素質和能力。不要忽略自我提升和專業發展，這對於建立可信個人品牌至關重要。'],
            ['yizixue_faq_id' => 3, 'title' => '易子學如何實現流量共享，發揮團結的力量？', 'content' => ' 
 	
易子學實現流量共享的方式之一是通過平台上的知識交流和互動功能。這包括諮詢問答、文章發表、線上講座等，會員可以分享自己的知識和經驗，也可以從其他會員那裡學習。此外，易子學還通過舉辦線上活動、與外部機構合作等方式，吸引更多的流量和關注，從而讓更多的人參與到平台上來，形成團結的力量。另外，易子學也通過社群媒體等渠道擴大影響力，將平台上的內容分享出去，吸引更多的人來訪問和參與。總的來說，易子學通過提供豐富多樣的內容和活動，讓會員之間形成團結，共同分享和受益，從而實現流量共享和團結的力量。'],
            ['yizixue_faq_id' => 3, 'title' => '為什麼台灣同學會是經營個人品牌的良好起點？', 'content' => '首先，台灣同學會是一個具有凝聚力和社群性的組織，會員們在海外都有共同的文化背景和身份認同，這樣的共同性有助於建立信任和合作關係。其次，台灣同學會提供了豐富多彩的活動和社交平台，這為個人品牌的曝光和宣傳提供了很好的機會，可以通過參與活動和社群互動來擴大個人影響力。此外，台灣同學會也是一個可以獲得支持和幫助的平台，會員們可以互相學習和成長，共同進步，這有助於個人品牌的建立和發展。最後，台灣同學會通常擁有一定的資源和人脈，這為個人品牌的發展提供了寶貴的資源和支持。'],
            ['yizixue_faq_id' => 3, 'title' => '經營台灣同學會時，最常碰到的問題？', 'content' => '1. 缺乏參與度：部分會員可能缺乏積極參與，導致活動或交流的效果不彰，影響了台灣同學會的凝聚力和互動性。
2. 組織管理：管理台灣同學會可能需要投入大量的時間和資源，包括組織活動、聯絡會員、籌劃項目等，管理上的不善可能導致運作不順暢。
3. 資金問題：籌措資金可能是一個挑戰，尤其是對於舉辦活動或推行計劃時，資金不足可能限制了台灣同學會的發展和運作。
4. 會員需求多樣性：會員之間的需求和興趣可能各不相同，如何滿足不同會員的需求，讓他們都感到滿意，是一個需要考慮的問題。
5. 組織形象和聲譽：台灣同學會的形象和聲譽對吸引新會員和維持現有會員的參與至關重要，任何負面事件或管理不善都可能對組織造成損害。'],
            ['yizixue_faq_id' => 3, 'title' => '如何透過易子學，來解決台灣同學會運營的挑戰？', 'content' => '1. 提升會員參與度：易子學平台可以作為台灣同學會成員與未來學弟妹之間交流的平台，可以在透過平台發布線上講座、討論區、線上活動等消息，吸引易子學會員參與並促進互動。
2. 資金與資源籌措：可以透過易子學平台聯合發表，進行線上免費與付費講座來吸引會員和外部支持者財務支持。透過共同的商務利益，擴大台灣同學會以及同學會間個人的變現能力。
3. 資訊分享和知識交流：易子學平台可以成為台灣同學會成員之間分享資訊和交流知識的平台，同時借力使力讓易子學會員可以即時獲取到最新的資訊，主動聯繫學長姐以建立正向的商務交流。'],
            ['yizixue_faq_id' => 4, 'title' => '易子學為確保會員與平台間的權利義務，加入會員前請確認同意以下規約條款：', 'content' => '《 會員規約 》 連結 ...
《 服務條款 》 連結 ...
《 免責聲明 》 連結 ...
《 學長姐會員服務條款 》 連結 ...
'],
            ['yizixue_faq_id' => 4, 'title' => '會員間在顧問諮詢過程中，需要注意以下事項：', 'content' => '1. 尊重對方：彼此都應該尊重對方的意見和專業知識，不論是會員還是學長姐。
2. 清楚溝通需求：確保雙方對顧問諮詢的需求和目標有清晰的理解，以確保有效的溝通和指導。
3. 保持開放心態：會員應該願意接受建議和批評，而學長姐則應該以開放的心態聆聽會員的問題和需求。
4. 保密性：確保諮詢過程中涉及的個人信息和敏感信息得到嚴格保密，不得向第三方透露。
5. 專業責任：學長姐作為顧問應該對其提供的建議和指導負起責任，確保其具有可靠性和可行性。
6. 明確界定角色：確保會員和學長姐對彼此的角色有清晰的理解，不會產生誤解或混淆。
7. 尋求多元意見：在做出決定之前，可以考慮尋求多個不同顧問的意見，以獲得更全面的建議和觀點。
8. 支付方式：確認雙方的實名支付方式，建議先以小筆費用確認帳號帳款無誤後，在依諮詢的次數或金額百分比，分批次執行付款。收支雙方都必須留下收支單據存檔，確保雙方權益。
9. 適時評價：在諮詢中給予即時的按讚與讚美，確保雙方是在正向有意義的討論。
10. 交易雙方除諮詢的必要性外，避免探聽個人資料與機敏性資料。'],
            ['yizixue_faq_id' => 4, 'title' => '易子學平台諮詢刊登服務：', 'content' => '會員同意並明瞭易子學僅提供學長姐諮詢刊登服務，於刊登期間內不保證一定尋得所需求的諮詢案件，且對於會員間資料正確性，易子學僅是代為傳送之資訊平台，不保證會員與諮詢案件資料之完整性、正確性，以及品質、品格等人格特質，會員交易仍須審慎確認。諮詢案件雙方之任何爭議，不論是諮詢期間或諮詢後，均應由交易雙方自行依法處理。'],
            ['yizixue_faq_id' => 4, 'title' => '未滿十八歲之未成年申請（會員規約第一條）：', 'content' => '會員若為未滿十八歲之未成年人，應於會員之法定代理人閱讀、瞭解並同意本條款之所有內容，方得註冊使用或繼續使用。當會員使用或繼續使用本服務時，即表示會員的法定代理人已閱讀、瞭解並同意接受本條款之所有內容及其後修改變更。為確保兒童及青少年使用網路的安全，並避免隱私權受到侵犯，家長（或監護人）應盡到下列義務：未滿十二歲之兒童使用本服務時時，應全程在旁陪伴，十二歲以上未滿十八歲之青少年使用本服務前亦應斟酌是否給予同意。'],
            ['yizixue_faq_id' => 4, 'title' => '會員資料正確性與更新（會員規約第二條）：', 'content' => '註冊本網站會員及使用本服務時，必須提供您本人正確、最新的資料，且無利用偽造或變造之資料作為重複註冊等情事、並維護及即時更新您個人資料之正確性。如個人資料有異動，請務必即時更新，以保障您的權益。如因會員未正確更新個人資料，致未能收到本網站寄發之會員權益、消費優惠、活動內容等相關資訊，會員同意在此情形下，視為會員已經收到該等資訊或通知。若您提供任何錯誤或不實資料、或未按指示提供資料、或欠缺必要之資料時，本網站有權不經事先通知，逕行暫停或終止提供本服務之全部或一部份。'],
            ['yizixue_faq_id' => 4, 'title' => '會員帳號密碼管理（會員規約第三條）：', 'content' => '會員帳號和密碼請由會員本人自行妥善保管及保密，並定期變更密碼，避免被他人知悉。依照規定方法輸入的會員帳號及密碼與登錄註冊資料一致時，無論是否由會員本人親自輸入，均視為會員本人所使用，即使係遭盜用、不當使用或其他本公司無法辨識是否為本人親自使用的情況，本公司對此所致的損害，概不負責。會員如果發現或懷疑其會員帳號和密碼遭第三人盜用、不當使用或有任何安全疑慮時，應立即主動通知本公司，本公司將採取適當之因應措施，包含且限不於停止該會員帳號所生交易之處理及後續利用。'],
            ['yizixue_faq_id' => 4, 'title' => '會員交易（會員規約第五條）：', 'content' => '會員透過本平台的伺服器或經由本服務連結之其他網站與商品或服務提供者之間進行的諮詢交易與諮詢服務，視為使用者與服務提供者（付費會員，學長姐）之間的直接交易，各該交易關係均僅存在使用者與各該服務提供者之間。除了本平台本身即為該項交易的提供者外，本公司與本平台並不屬於交易的直接當事人，對於交易恕不負擔任何責任。因此，使用者對服務提供者（付費會員，學長姐）之諮詢服務、或其他交易標的物之品質、內容、運送、保證與瑕疵擔保等其他交易事項所生之爭執，應自行向各該服務提供者尋求解決。'],
            ['yizixue_faq_id' => 4, 'title' => '會員非法與違反之行為（會員規約第十條）：', 'content' => '會員同意不得於本平台騷擾、恐嚇其他會員（使用者）或從事任何非法、違反公序良俗之行為。同意不上傳病毒或其他攻擊程式碼。同意未經本平台事前書面同意，不得發布任何他人之個人聯絡資訊。同意不發布任何誹謗侵害他人名譽或為謠言、猜測、捏造不實言論等行為。同意不在本平台從事任何銷售或多層次傳銷或與發表與主題無關的商業廣告行為。同意不會進行任何會導致本平台關閉、超載、損害正常運作或外觀之行為。同意不得於於本平台公開蒐集其他使用者之聯絡資訊。同意若發生違反以上各項約定，經查明屬實者，本平台得視情節輕重限制會員帳號的服務使用權或刪除會員資格，並拒絕會員爾後使用本平台各項服務之權利。'],
            ['yizixue_faq_id' => 4, 'title' => '會員內容發布（會員規約第十一條）：', 'content' => '會員同意必須遵守保護其他人權利，同意不會在本平台張貼任何侵犯、揭露他人隱私或純屬他人私領域之言論或物品。會員同意本平台有權逕行移除有違反本平台政策或會員規約的任何內容或資料。若經本平台通知仍未改善者，本平台有權停止會員繼續使用本平台之權利。會員同意不會亦不得誘使他人於本平台，發布其個人身分證明文件或敏感性個人資料。會員同意且了解，若因會員未遵守本平台會員規約，致侵害他人權益或造成本平台之損害（包括且不限於商譽之損害），會員同意負擔所有相關之損害賠償或回復原狀之責任。'],
            ['yizixue_faq_id' => 4, 'title' => '會員承諾（會員規約第十四條）：', 'content' => '會員承諾絕不為任何非法目的或以任何非法方式使用本服務，並承諾遵守中華民國相關法規及一切使用網際網路之國際慣例。會員若係中華民國以外之使用者，並同意遵守所屬國家或地域之法令。會員同意並保證不得利用本服務從事侵害他人權益或違法之行為，包括但不限於：公布或傳送任何誹謗、侮辱、具威脅性、攻擊性、不雅、猥褻、不實、違反公共秩序或善良風俗或其他不法之文字、圖片或任何形式的檔案。侵害或毀損本公司或他人名譽、隱私權、營業秘密、商標權、著作權、專利權、其他智慧財產權及其他權利。違反依法律或契約所應負之保密義務。冒用他人名義使用本服務。傳輸或散佈電腦病毒。從事未經本網站事前授權的商業行為。刊載、傳輸、發送垃圾郵件、連鎖信、違法或未經本網站許可之多層次傳銷訊息及廣告等；或儲存任何侵害他人智慧財產權或違反法令之資料。對本服務其他會員（使用者）或第三人產生困擾、不悅或違反一般網路禮節致生反感之行為。其他不符本服務所提供的使用目的之行為或本網站有正當理由認為不適當之行為。'],
            ['yizixue_faq_id' => 4, 'title' => '無消費者保護法第十九條第一項規定『七天鑑賞期』之適用（服務提供者（學長姐，付費會員）服務條款第三條）：', 'content' => '學長姐（付費會員）了解並同意其與本平台間之會員付費服務之法律關係非為消費者保護法所稱之『特種買賣』，故無消費者保護法第十九條第一項規定『七天鑑賞期』之適用。'],
        ];
        foreach($data as $item){
            YizixueFaq::create([
                'yizixue_faq_category_id' => $item['yizixue_faq_id'],
                'title' => $item['title'],
                'content' => $item['content'],
            ]);
        }

    }
}