# Created by: Henk van Oers <hvo.pm@xs4all.nl>
# $FreeBSD$

PORTNAME=	Dancer2-Plugin-Database
PORTVERSION=	2.13
CATEGORIES=	databases perl5
MASTER_SITES=	CPAN
PKGNAMEPREFIX=	p5-

MAINTAINER=	perl@FreeBSD.org
COMMENT=	Easy database connections for Dancer2 applications

LICENSE=	ART10 GPLv1
LICENSE_COMB=	dual

BUILD_DEPENDS=	p5-Dancer2>=0.151000:${PORTSDIR}/www/p5-Dancer2 \
		p5-Dancer-Plugin-Database-Core>=0.12:${PORTSDIR}/databases/p5-Dancer-Plugin-Database-Core
RUN_DEPENDS:=	${BUILD_DEPENDS}
TEST_DEPENDS=	p5-DBD-SQLite>=0:${PORTSDIR}/databases/p5-DBD-SQLite \
		p5-DBI>=0:${PORTSDIR}/databases/p5-DBI \
		p5-HTTP-Message>=0:${PORTSDIR}/www/p5-HTTP-Message \
		p5-Plack>=1.0032:${PORTSDIR}/www/p5-Plack \
		p5-Test-Pod>=1.22:${PORTSDIR}/devel/p5-Test-Pod \
		p5-Test-Pod-Coverage>=1.08:${PORTSDIR}/devel/p5-Test-Pod-Coverage

NO_ARCH=	yes
USES=		perl5
USE_PERL5=	configure

.include <bsd.port.mk>
